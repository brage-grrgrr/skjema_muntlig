# Navn på prosjektet
## Login netside hvor man kan droppe å loge inn
# Prosjektbeskrivelse. Må inneholde en oversikt over de viktigste funksjonene og hva brukerne kan gjøre på nettsiden. Må inneholde hvilke programmeringsspråk du har brukt i prosjektet.
## hvordan netsiden fungerte
Hvordan netsiden fungerte hvar at man kunne enten velge mellom å registrere seg eller loge inn på første side.
PÅ registrerings siden så kunne man skrive inn brukernavn og passord som begge måtte bli skrivet også trykke på en knapp som registrerte brukeren og da spurte om de ville gå inn til login siden.
Vis det ikke gikk eller det fantes allerede en brukker med det navnet som ble foreslåt så får brukeren en feilmelding.

På login siden så kunne brukeren loge inn eller velge å ikke loge inn.

Vis brukeren valgte å loge inn så ville den komme til en ny side som forklarte at brukeren kunne skrive i et input field og trykke på en kanp som da ville endre på titelen.

Vis brukeren valgte å ikke loge inn så vilel akkurat det samme som å loge inn skje men brukeren ville ikke få muligheten til å endre tittelen.
## Programeringspråk
sql ble brukt for å lagge databasen formelen ble slik

```mysql> CREATE TABLE User_database.account ( ```
```-> item_id INT AUTO_INCREMENT, ```
```-> brukernavn VARCHAR(255) UNIQUE, ```
```-> passord VARCHAR(255), ```
```-> PRIMARY KEY (item_id) ```
```-> );```
```Query OK, 0 rows affected (1.69 sec) ```




Jeg tok i bruke Html og css for netsidens layout.
PhP for å koble til databasen og gjøre det mulig å logge in og registrere med hjelp av php samtidig som jeg brukte PhP til å skape en reaksjoner kode som vis brukeren ikke loget in ville gjøre den ene koden usynlig.

``` /* vis brukeren ikke er loget inn som for eksempel i at de hoppet over å loge inn så vil den gjøre så allt i  klasen "endre" vis ingetning */ ```
``` <?php if (!$loggedIn || $skipLogin) { ?> ```
``` .endre { ```
``` display: none; ```
``` } ```
``` <?php } ?> ``

Jeg brutke javascript til å lagge et input fill hvor en person kunne skrive og trykke på en kanpe som ville aktivere funktonen og endre titelen
JS
```function endretitel() { ```
```    var nyetittel = document.getElementById("nyetittel").value ```
```    document.getElementById("titel").innerHTML = nyetittel; ```
```} ```
HTML

```<a class="endre">```
```<p>her kan du endre titetel på netsiden</p> ```

```    <input type="text" name="fname" id="nyetittel"><br> ```
```   <input type="button" onclick="endretitel()"> ```
```    </a>```

```<div class="header">```
```  <h1 id="titel">Velkomen til netsiden hakke peiling</h1>```
```  <p>Vis du ikke er logget inn så vil noe av informasjonen bli gjemt</p>```
```</div>```

## den viktigste koden
enkelt forklart så er den vitkigste koden php.

Login side
php koden blir bare aktivert igjennom if løken vis post har blit aktivert og igjenom koden så vil den gå igjennom databasen for å se om det er en bruker i databasen med de verdiene og vis det er en bruekr så sender den brukeren til Hovedsiden eller så sier den at passordet eller brukernavnet er feil.

Registreringsside
Gjør akkurat det samme bare at den istedenfor å loge inn registrer brukeren i databsen og vis den finner en registert bruker med samem brukernavn så spør den om brukeren av netisden kan heller inpute et annet navn. etter at brukeren er registret så vill den gi forslag i å gå til log siden.

Loget inn eller ikke loget inn?
Siste php kode starter når linken for å ikke loge inn blir trykket
 ```   <a href="hovedsiden.php?skip=1">Skip Login</a> ````
Fordi når den går til hovedsiden så vil den ha en kode som vil kjeke om skip=1 ble sendt og lagre det 
```$skipLogin = isset($_GET['skip']) && $_GET['skip'] == 1```
```$loggedIn = !$skipLogin && isset($_SESSION['bruker_id']);```

derret vis verdiene er 100% like så vil den i style endre på noen av html tingene i classen endre.

```<?php if (!$loggedIn || $skipLogin) { ?> ```
 ```   .endre { ```
 ```       display: none; ```
 ```   } ```
```<?php } ?> ```

## Hvordan kjøre programmet. (Må noe lastes ned, må man skrive noe spesielle syntaxer?)
For å kjøre programet så må man skrive inn linken som er [Lenketekst](http://172.20.128.61/login.php)


## sikkerhet
Det jeg har gjort for å gjøre netsiden emr sikker er å hashe passordet til databsen så man kan ikke gå inn i mysql for å se passordet. Samtidig for å gjøre så ingen havner i en annnens person bruker så har jeg gjort så det kreves at brukernavnet er unikt.


## logg
PÅ starten så fulgte jeg isntruksene fra linken i notion. 
Derreter så møtte jeg på et problem med github som var at jeg ikke fikk opp forslage til source kontorl og brukte 1 time og 30 minuter eller mer på fiske problemet som var at jeg måtte laste den git på nyt i terminalen selv om jeg hadde gjort det fra før av. Værste av allt var at jeg hadde testet dette fra før av i en annen server og da gikk det fint.
Etter å ha fikset det problemet så startet jeg å implemintere allt jeg trengte fra php og sql


## kilder
som kilder så brukte jeg w3schools som da viste meg hvordan de ulike kodene fugnerte og noen ekster funksjoner som hvordan jeg kunen alge en input felt som kunen endre på titelen

Chatgpt brukte jeg for å se igjennom feil i koden og for å finne kjapere koden til å gjør så vis brukeren ikke loget inn så ville den displaye ingenting i classen endre.

allt i denne linken følgte jeg for å sette opp serveren og resten
[Lenketekst](https://www.notion.so/Eksamsoppgave-IT-18f80e94a4a48065a4a1ef30ce6e73e7)
