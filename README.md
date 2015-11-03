Mocker
======

###1. Opis aplikacji 
Celem aplikacji jest umo¿liwienie u¿ytkownikom na wygenerowanie linków do wczeœniej przygotowanych danych np. json czy xml. Dziêki aplikacji mo¿liwe bêdzie przygotowanie ró¿nych odpowiedzi serwera i przetestowanie ich zarówno przez klientów mobilnych jak i inne serwery.

###2. Interfejs u¿ytkownika

###3. U¿yte technologie
* Jêzyk programowania: PHP
* Framework: Symphony2
* Baza danych: MySQL
* ORM do obs³ugi bazy danych: Doctrine 
* Frontend: AngularJS (lub Polymer)
* System kontroli wersji: GIT (repozytorium na github.com)
* Interfejs: Material Design for Bootstrap

###4. ERD bazy danych 

Tabele:
##mock – pojedyncza odpowiedŸ serwera zadeklarowana przez u¿ytkownika
* mockId – id 
* url – link ¿¹dania 
* userId – id u¿ytkownika
* responsStatus – kod odpowiedzi 
* createdAt – data utworzenia 
* body – treœæ odpowiedzi 
* blocked – ¿¹danie aktywne lub zablokowane
* deleted – wartoœæ 1 dla usuniêtego ¿¹dania  

##user – tabela u¿ytkowników (mo¿e zostaæ zast¹piona przez bibliotekê)
* userId – id
* username – nazwa u¿ytkownika 
* password – has³o u¿ytkownika 
* email – email u¿ytkownika
* createdAt – data utworzenia u¿ytkownika 

##header – nag³ówki dla odpowiedzi z serwera 
* headerId – id
* key – klucz nag³ówka 
* value – wartoœæ nag³ówka 
* mockId – id mock`a
