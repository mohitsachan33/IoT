#include <SPI.h>
#include <DMD2.h>
#include <fonts/SystemFont5x7.h>
#include <fonts/Arial14.h>
#define ESP8266

#define pin_A 16
#define pin_B 12
#define pin_sclk 0
#define pin_noe 15
#define panel_width 1
#define panel_heigh 1

SPIDMD dmd(panel_width, panel_heigh, pin_noe, pin_A, pin_B, pin_sclk);  // DMD controls the entire display
DMD_TextBox box(dmd); 
const char *MESSAGE = "Quasar Enterprises ";
const uint8_t *FONT = Arial14;
// the setup routine runs once when you press reset:
void setup() {
  dmd.beginNoTimer();
  dmd.setBrightness(255);
  dmd.selectFont(SystemFont5x7);
  dmd.selectFont(FONT);
  dmd.begin();
}

int n = 123;
unsigned long previousMillis = 0;        // will store last time LED was updated


const long interval = 3000;
int ledState = LOW;


void loop() {
  unsigned long currentMillis = millis();

  if (currentMillis - previousMillis >= interval) {
    previousMillis = currentMillis;

   /* if (ledState == LOW) {
      ledState = HIGH;
      dmd.fillScreen(true);
    } else {
      ledState = LOW;
      dmd.fillScreen(false);
      //dmd.drawString(0,0,String(n));
      //n = n + 1;
    }
    
   // dmd.drawString(0,0,String(n));
   // n = n + 1;
    Serial.println(n);*/
const char *next = MESSAGE;
  while(*next) {
    Serial.print(*next);
    box.print(*next);
    delay(500);
    next++;
  }
}
}
