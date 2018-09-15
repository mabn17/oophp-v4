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

Kommer senare ..



Kmom05
-------------------------

Kommer senare ..



Kmom06
-------------------------

Kommer senare ..



Kmom07-10
-------------------------

Kommer senare ..
