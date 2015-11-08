Mocker
======

###1. Opis aplikacji 
Celem aplikacji jest umo�liwienie u�ytkownikom na wygenerowanie link�w do wcze�niej przygotowanych danych np. json czy xml. Dzi�ki aplikacji mo�liwe b�dzie przygotowanie r�nych odpowiedzi serwera i przetestowanie ich zar�wno przez klient�w mobilnych jak i inne serwery.

###2. Interfejs u�ytkownika
![alt text](https://github.com/kgurgul/mocker/blob/master/info/UI_Interface.png "UI")

###3. U�yte technologie
* J�zyk programowania: PHP
* Framework: Symphony2
* Baza danych: MySQL
* ORM do obs�ugi bazy danych: Doctrine 
* Frontend: AngularJS (lub Polymer)
* System kontroli wersji: GIT (repozytorium na github.com)
* Interfejs: Material Design for Bootstrap

###4. ERD bazy danych 
![alt text](https://github.com/kgurgul/mocker/blob/master/info/ERD.png "ERD")

####mock � pojedyncza odpowied� serwera zadeklarowana przez u�ytkownika
* mockId � id 
* url � link ��dania 
* userId � id u�ytkownika
* responsStatus � kod odpowiedzi 
* createdAt � data utworzenia 
* body � tre�� odpowiedzi 
* blocked � ��danie aktywne lub zablokowane
* deleted � warto�� 1 dla usuni�tego ��dania  
* method - metoda ��dania 

####user � tabela u�ytkownik�w (mo�e zosta� zast�piona przez bibliotek�)
* userId � id
* username � nazwa u�ytkownika 
* password � has�o u�ytkownika 
* email � email u�ytkownika
* createdAt � data utworzenia u�ytkownika 

####header � nag��wki dla odpowiedzi z serwera 
* headerId � id
* key � klucz nag��wka 
* value � warto�� nag��wka 
* mockId � id mock`a

###5. Dodatkowe opcje mockowania
Aby u�y� specjalnych tag�w nale�y u�y� szablonu: {{nazwa_tagu?opcjonalne_parametry}}

####Dost�pne tagi:
#####Date - wy�wietla aktualn� dat�. 
Dost�pne parametry:
* format - string formatuj�cy aktualn� dat� ([dokumentacja](http://php.net/manual/pl/function.date.php))

Przyk�ady u�ycia:
* {{Date?}} - zwraca dat� z formatowaniem domy�lnym "Y-m-d H:i:s" np. 2015-11-08 22:50:16
* {{Date?format=Y-m-d}} - zwraca dat� z podanym formatowaniem np. "Y-m-d" zwraca 2015-11-08