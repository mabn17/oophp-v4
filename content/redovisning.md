---
---
Redovisning
=========================
Redovisningstexten är skriven i markdown och hittas i filen `content/redovisning.md`.

Kmom01
-------------------------
###### Hur känns det att hoppa rakt in i objekt och klasser med PHP, gick det bra och kan du relatera till andra objektorienterade språk?
Jag är ganska van vid objekter och klasser efter *Oo-Python* och *JavaScript* kurserna. Guiden gav en bra inblick om hur klasserna fungerar och jag ser fram emot att lära mig mer. Däremot är det riktigt ovant att använda sig av *`$klass->`* för att kalla på variablerna eller metoden istället för en enkel ..


###### Berätta, hur det gick det att utföra uppgiften "Gissa numret" med GET, POST och SESSION?

Det känndes som en lagom repetition om hur man använder dem från HTMLPHP kursen, speciellt efter man inte har kodat så mycket under sommaren. 

Efter man var klar med ***POST*** delen fick man ***GET*** på köpet. 

I ***SESSION*** upgiften valde jag även att bara sprara nummret och antalet försök man har kvar. Känndes onödigt att spara hela objektet då man ändå skapar ett nytt objekt med båda variablerna som skickades med hjälp av ***POST***.

Skriver man ett tal som är högre än 100 eller lägre än 1 kastas GuessException och ett medelande kommer fram men man kan fortsätta spela. När man inte har några gissningar kvar får man ett option att restarta spelet. 

###### Har du några inledande reflektioner kring me-sidan och dess struktur?
Inte riktigt jag började att kolla igenom de flesta filerna för att se hur det fungerade. Jag fick ändra lite i `view/anax/v2/layout/default.php` för att alla wrappers skulle fungera med Bootstrap då de inte ville komma överens.

###### Vad är ditt TIL för detta kursmoment?
Jag har kikat lite extra på hur man kan använda sig av Bootstrap vilket underlättar en hel del. Däremot gillar jag hur vi använder oss utav en "autoload" för klasserna istället för att kunna behöva inkludera en massa filer vid ett större projekt.



Kmom02
-------------------------
###### Hur gick det att överföra spelet “Gissa mitt nummer” in i din me-sida?
I sin helhet gick det bra, anax har ändrat sin struktur lite sedan **Mos** spelade in sina videor så fick man kolla igenom det lite mer. Jag valde att skapa en ny router fil `001_gissa.php` för att dela upp det lite mer, dock så ville inte `$app->router` använda sig av ->post så jag la in en any route istället. Annars var det inga konstigheter.

###### Berätta om hur du löste uppgiften med Tärningsspelet 100, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?
Jag började med att göra UML diagrammet för att få en grundtanke hur jag skulle utföra uppgiften. Sedan delade upp koden i tre klasser, Dice och DiceHand som jag återanvände från ***oophp2*** samt en ny DiceGame, som sköter alla nödvändiga funktioner.

Eftersom man jobbar med mer variabler än i *guess my number* så valde jag att använda mig utav post och session, där jag sparar/skickar hela klassen. Och som vanligt är min GUI inte den vackraste. Däremot så gillade validatorn inte add jag hade förmånga publika klasser för spelhanteraren, vilket ledde till lite mer kod utanför klassen än räknat, då det känndes onödigt att lägga till en extra klass för två metoder.

###### Berätta om din syn på modellering likt UML jämfört med verktyg som phpDocumentor. Fördelar, nackdelar, användningsområde? Vad tycker du om konceptet make doc?
UML och phpDocumentor gör två olika saker. *UML* är bra att göra ibörjan av sitt projekt då man gör grundtanken på hur det kommer byggas upp. Nackdelen är dock att man kanske inte alltid kan följa diagrammet, ibland kanske man behöver ändra på någon sak, lägga till extra metoder.

*phpDocumentor* blir då mer som en komplettering av uml diagrammet, man slipper ändra det man redan har gjort och det sköter allt åt en. Detta gör bara documentation om man som redan är skrivet och kan därför vara svårare att användra under utväcklingen. 

###### Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?
Jag tycker det blir lite krångligare att skriva det direkt in i ramverket, troligen för att jag själv inte riktigt har kontroll på vart klasserna och annat hamnar, i gämfört när man bara skriver ett programm själv utanför ramverket då det inte riktigt finns andra saker som "skräpar" runt om.

Däremot blir det mer struktur med koden innuti i ramverket, alla saker ligger tillsammans med liknande kod och det kommer nog bli lättare ju mer man sitter med anax.

###### Vilken är din TIL för detta kmom?
Tyckte automatgenereringen av dokumentationen med `make doc` var trevlig och den sparar bra med tid än om man skulle göra det för hand. Lärde mig också mer om hur namespaces fungerar.




Kmom03
-------------------------
###### Har du tidigare erfarenheter av att skriva kod som testar annan kod?
Jag har lite erfarenhet efter det vi gjorde i oopython kursen, men utifrån det så har jag inte gjort det innan.

###### Hur ser du på begreppen enhetstestning och att skriva testbar kod?
Enhetstesting är något som jag har gillat sedan vi började med det i oopython. Det ger en bra grund och man kan lätt ändra saker som förbettrar koden utan att behöva oroa sig för att man har tagit sönder koden. Det kan viserligen kanske kännas lite onödigt för små programm som "gissa mitt nummer".

###### Förklara kort begreppen white/grey/black box testing samt positiva och negativa tester, med dina egna ord.
Jag har inte läst så mycket om det men om jag får gissa så kan jag tänka mig att blackbox testing är när man försöker, att peta på svaga punkter och ta sönder sin kod. Whilebox att kolla så att allt man har tänkt fungerar som det är tänkt. Greybox hade jag ingen aning om innan jag googlade på var det va, men det är när man försöker få fram sårbarheter och som kan visa skadlig information om koden.

###### Berätta om hur du löste uppgiften med Tärningsspelet 100, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?
Detta gjorde jag redan i förra kmom och skrev lite om det där innan mos bestämmde sig för att flytta på uppgiften :(.

###### Hur väl lyckades du testa tärningsspelet 100?
Det gick bra, behövde inte skriva så många tester och stötte inte på några större problem, blev däremot en del googlande på hur man skulle testa errorn. Jag kunde kanske lägga lite mer tid på att förbättra den men la extra tiden på att börja med min Induviduella Programmvaru Project då jag fick en java applikation...

###### Vilken är din TIL för detta kmom?
Lärde mig inget speciellt detta kursmoment, var ganska lungt då jag gjorde det mesta i föregående kursmoment. Tyckte däremot att error-testing i php var lite konstigt uppbyggt.





Kmom04
-------------------------
###### Vilka är dina tankar och funderingar kring trait och interface?
Jag har aldrig jobbat med interfaces/traits innan detta kursmoment och personligen skulle jag gärna velat ha någom extra övning i artikeln, då det inte riktigt känndes tillräkligt. Det gick ändå ganska bra att implomentera det in i hundra spelet där den visar historik på alla kast för den aktiva spelaren.

Traits är något som känns ganska användningsbart för att hålla koden mer DRY så man kan slippa att ge två olika klasser samma metod. Och interfaces känns som ett bra sätt att strukturera koden. Just nu känns de dock lite onödiga när vi inte gör så stora saker.

###### Hur gick det att skapa intelligensen och taktiken till tärningsspelet, hur gjorde du?
Det gick helt okej, jag valde att inte göra något särskilt komplicerat. Datorn tar sina beslut beroende på poängställningen, det är ganska ivrig och vill helatiden vara den som leder poäng mässigt.
Så sålänge den har minde poäng än sin motståndare så fortsätter den att kasta och så snabbt ***potten*** + datorns poäng är större än sin motståndare så sparar den sina poäng.

###### Några reflektioner från att integrera hårdare in i ramverkets klasser och struktur?
Inte riktigt, jag har redan försökt att gå igenom koden lite för att se hur saker fungerar, men nu efter 4 kursmoment tycker jag att, jag har någorlunda koll på hur man hanterar det.
Och dokumentationen var bra så var inte alls svårt att ändra till Anax\Session m.m.  

###### Berätta hur väl du lyckades med make test inuti ramverket och hur väl du lyckades att testa din kod med enhetstester och vilken kodtäckning du fick.
Jag behövde inte riktigt skriva om mina tester från det föregående momentet, den enda riktiga skillnaden var att jag la in "AI:t". Så det ända som jag igentligen fick göra var att skriva en ny test klass för traitet.
Det tog ett litet tag innan jag förstod hur `expectOutputString` fungerade men tillslut så lyckades jag få 100%.

###### Vilken är din TIL för detta kmom?
Som nämt innan blir det traits och interfaces. Båda är hely nya för mig och jag kan se vissa användningsområden när man kodar något större.



Kmom05
-------------------------
###### Några reflektioner kring koden i övningen för PHP PDO och MySQL?
Jag gjorde inte övningen så kan inte säga något om man gjorde något speciellt. Däremot tyckte jag att det var en bra grund till en databas som vi fick leka med. Egentligen borde jag kanske göra Lagrade procedurer för att underlätta med struntade i det eftersom upgiften inte sa något om det.

Eftersom de flesta collmunerna inte hade något värde på någon film så gjorde jag ingen CRUD just för dem.

###### Hur gick det att överföra koden in i ramverket, stötte du på några utmaningar?
Det gick ganska smärtfritt. Jag stötte inte på några problem utöver att har stavat fel på ett input namn, tog ett litet tag att hitta..

###### Berätta om din slutprodukt för filmdatabasen, gjorde du endast basfunktionaliteten eller lade du till extra features och hur tänkte du till kring användarvänligheten och din kodstruktur?
Kodstrukturen blev ganska bra, kunde nog göra någon liten funktion för att få det mer DRY. Och som jag skrev innan kunde man nog göra någon procedur istället för att skriva hela SQL koden. 

Den enda extra funktionen jag la till för detta kursmoment var inloggningen. Även om jag gjorde det i databas kursen så Kändes att det var dags att göra den då jag tror att jag missade den i htmlphp (inte säker). Annars lekte jag mer runt med stilen och gjorde några småsaker som förbättrar för användaren t.ex inte behöva skriva img/ innan bildnamnet.

###### Vilken är din TIL för detta kmom?
Detta kursmoment känndes mest som en repetition på databas kursen, enda skillnaden var att vi använde oss av PHP ist för JS. Men måste jag säga något så får det bli att använda sig av BTH's databas istället för att bara köra på den lokala. 

Annat TIL är att man inte har så mycket disc space på studentservern. Jag fick ta bort anax-flat repot från design kursen för att kunna ladda upp redovisningssidan, det mos gjorde verkade inte hjälpa.



Kmom06
-------------------------

Kommer senare ..



Kmom07-10
-------------------------

Kommer senare ..
