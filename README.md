Mocker
======

###1. Opis aplikacji 
Celem aplikacji jest umo¿liwienie u¿ytkownikom na wygenerowanie linków do wczeœniej przygotowanych danych np. json czy xml. Dziêki aplikacji mo¿liwe bêdzie przygotowanie ró¿nych odpowiedzi serwera i przetestowanie ich zarówno przez klientów mobilnych jak i inne serwery.

###2. Interfejs u¿ytkownika
![alt text](https://github.com/kgurgul/mocker/blob/master/info/UI_Interface.png "UI")

###3. U¿yte technologie
* Jêzyk programowania: PHP
* Framework: Symphony2
* Baza danych: MySQL
* ORM do obs³ugi bazy danych: Doctrine 
* Frontend: AngularJS (lub Polymer)
* System kontroli wersji: GIT (repozytorium na github.com)
* Interfejs: Material Design for Bootstrap

###4. ERD bazy danych 
![alt text](https://github.com/kgurgul/mocker/blob/master/info/ERD.png "ERD")

####mock – pojedyncza odpowiedŸ serwera zadeklarowana przez u¿ytkownika
* mockId – id 
* url – link ¿¹dania 
* userId – id u¿ytkownika
* responsStatus – kod odpowiedzi 
* createdAt – data utworzenia 
* body – treœæ odpowiedzi 
* blocked – ¿¹danie aktywne lub zablokowane
* deleted – wartoœæ 1 dla usuniêtego ¿¹dania  
* method - metoda ¿¹dania 

####user – tabela u¿ytkowników (mo¿e zostaæ zast¹piona przez bibliotekê)
* userId – id
* username – nazwa u¿ytkownika 
* password – has³o u¿ytkownika 
* email – email u¿ytkownika
* createdAt – data utworzenia u¿ytkownika 

####header – nag³ówki dla odpowiedzi z serwera 
* headerId – id
* key – klucz nag³ówka 
* value – wartoœæ nag³ówka 
* mockId – id mock`a

###5. Dodatkowe opcje mockowania
Aby u¿yæ specjalnych tagów nale¿y u¿yæ szablonu: {{nazwa_tagu?opcjonalne_parametry}}

####Dostêpne tagi:
#####Date - wyœwietla aktualn¹ datê. 
Dostêpne parametry:
* format - string formatuj¹cy aktualn¹ datê ([dokumentacja](http://php.net/manual/pl/function.date.php))

Przyk³ady u¿ycia:
* {{Date?}} - zwraca datê z formatowaniem domyœlnym "Y-m-d H:i:s" np. 2015-11-08 22:50:16
* {{Date?format=Y-m-d}} - zwraca datê z podanym formatowaniem np. "Y-m-d" zwraca 2015-11-08