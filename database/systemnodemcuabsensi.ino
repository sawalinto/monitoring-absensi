#include <RTClib.h>
#include <LiquidCrystal_I2C.h>
 
 
#include <Wire.h>
 
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <SPI.h>
#include <MFRC522.h>
 
//LiquidCrystal_I2C lcd(0X3F, 16, 2);
LiquidCrystal_I2C lcd(0X27, 16, 2);
RTC_DS1307 rtc;
 
 
 
const char* ssid[] = {"rfid", "www.hadiryaa.com"} ;
const char* pass[] = {"12345566", "222222223"};
 
const int   ssid_count = sizeof(ssid) / sizeof(ssid[0]); // number of known networks
 
const char* host = "192.168.67.247";
 
 
 
WiFiClient client;
 
constexpr uint8_t RST_PIN = 0;
constexpr uint8_t SS_PIN = 2;
 
MFRC522 rfid(SS_PIN, RST_PIN);
 
MFRC522::MIFARE_Key key;
String id;
String data;
int nbVisibleNetworks;
 
 
const int speaker = 15;
int i, n;
char namaHari[7][12] = {"Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"};
void setup() {
  boolean wifiFound = false;
  lcd.init();
  lcd.backlight();
  lcd.setCursor(0, 0);
  lcd.print("DEVICE OK");
  delay(1000);
  lcd.clear();
  Wire.begin(4, 5);
  rtc.begin();
  rtc.adjust(DateTime(__DATE__, __TIME__));
  if (! rtc.begin()) {
    Serial.println("RTC TIDAK TERBACA");
    while (1);
  }
  if (! rtc.isrunning()) {
    Serial.println("RTC is NOT running!");
    rtc.adjust(DateTime(F(__DATE__), F(__TIME__)));//update rtc dari waktu komputer
  }
  // put your setup code here, to run once:
  Serial.begin(9600);
  SPI.begin();
  pinMode(speaker, OUTPUT);
  rfid.PCD_Init();
  WiFi.mode(WIFI_STA);
  WiFi.disconnect();
  delay(100);
  Serial.println("Setup done");
  nbVisibleNetworks = WiFi.scanNetworks();
  Serial.println("scan done");
  if (nbVisibleNetworks == 0) {
    Serial.println(F("no ntwrk found"));
    while (true); // no need to go further, hang in there, will auto launch the Soft WDT reset
  }
  for (i = 0; i < nbVisibleNetworks; ++i) {
    Serial.println(WiFi.SSID(i)); // Print current SSID
    for (n = 0; n < ssid_count; n++) { // walk through the list of known SSID and check for a match
      if (strcmp(ssid[n], WiFi.SSID(i).c_str())) {
        Serial.print(F("\tNot matching "));
        Serial.println(ssid[n]);
      } else { // we got a match
        wifiFound = true;
        break; // n is the network index we found
      }
    } // end for each known wifi SSID
    if (wifiFound) break; // break from the "for each visible network" loop
  } // end for each visible network
  WiFi.begin(ssid[n], pass[n]);
  while ((!(WiFi.status() == WL_CONNECTED))) {
    Serial.print(".");
    lcd.print("Menghubungkan ...");
    delay(300);
    lcd.clear();
  }
  if (WiFi.status() == WL_CONNECTED)
  {
    Serial.println("Wifi Terhubung");
    digitalWrite(speaker, HIGH);
    delay(500);
    digitalWrite(speaker, LOW);
 
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("WIFI CONNECT");
    lcd.setCursor(0, 1);
    lcd.print("ABSEN DISINI!");
    delay(1000);
    lcd.clear();
  }
}
void loop() {
  DateTime now = rtc.now();
  while ((!(WiFi.status() == WL_CONNECTED))) {
    Serial.print(".");
    lcd.print("Menghubungkan ...");
    delay(300);
    lcd.clear();
  }
 
 
  lcd.setCursor(0, 1);
  lcd.print(namaHari[now.dayOfTheWeek()]);;
  lcd.print('|');
  lcd.print(now.hour());
  lcd.print(':');
  lcd.print(now.minute());
  lcd.print(':');
  lcd.print(now.second());
  delay(1000);
 
  if (WiFi.status() == WL_CONNECTED)
  {
    //    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("ABSEN DISINI");
  }
 
  if (rfid.PICC_IsNewCardPresent()) {
    koneksi_database();
 
    readRFID();
 
    Serial.print("ID CARD: ");
    Serial.println(id);
 
 
    Serial.print("Terhubung Ke : ");
    Serial.println(host);
 
    String Link;
    HTTPClient http;
    //    http://localhost/absensi/cek-sensor.php?id=2018030199
    Link = "http://" + String(host) + ":8080" + "/absensi/cek-sensor.php?id=" + String(id);
    http.begin(client, Link);
    http.GET();
    http.end();
 
 
 
 
    String LinkId;
    HTTPClient httprelay;
    LinkId = "http://" + String(host) + ":8080" + "/absensi/cek-sensor.php?id=" + String(id);
    httprelay.begin(client, LinkId);
    //ambil isi data
    httprelay.GET();
    String responWeb = httprelay.getString();
    lcd.clear();
    lcd.setCursor(0, 0);
    Serial.println(responWeb);
    lcd.print(responWeb);
    lcd.setCursor(0, 1);
    //    lcd.clear();
    lcd.print("Terimah Kasih");
 
    //
 
    delay(1000);
 
    httprelay.end();
    lcd.clear();
 
  }
}
 
 
 
void readRFID() {
 
  rfid.PICC_ReadCardSerial();
  id = String(rfid.uid.uidByte[0]) + String(rfid.uid.uidByte[1]) + String(rfid.uid.uidByte[2]) + String(rfid.uid.uidByte[3]);
 
  if (id)
  {
    digitalWrite(speaker, HIGH);
    delay(500);
    digitalWrite(speaker, LOW);
  }
  delay(500);
}
 
void koneksi_database()
{
  if (!client.connect(host, 80)) {
    Serial.println("Gagal Konek");
    return;
  }
  else {
    Serial.println("Berhasil Konek");
    return;
  }
}
