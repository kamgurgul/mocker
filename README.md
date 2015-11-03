Mocker
======

###1. Opis aplikacji 
Celem aplikacji jest umo�liwienie u�ytkownikom na wygenerowanie link�w do wcze�niej przygotowanych danych np. json czy xml. Dzi�ki aplikacji mo�liwe b�dzie przygotowanie r�nych odpowiedzi serwera i przetestowanie ich zar�wno przez klient�w mobilnych jak i inne serwery.

###2. Interfejs u�ytkownika

###3. U�yte technologie
* J�zyk programowania: PHP
* Framework: Symphony2
* Baza danych: MySQL
* ORM do obs�ugi bazy danych: Doctrine 
* Frontend: AngularJS (lub Polymer)
* System kontroli wersji: GIT (repozytorium na github.com)
* Interfejs: Material Design for Bootstrap

###4. ERD bazy danych 

Tabele:
##mock � pojedyncza odpowied� serwera zadeklarowana przez u�ytkownika
* mockId � id 
* url � link ��dania 
* userId � id u�ytkownika
* responsStatus � kod odpowiedzi 
* createdAt � data utworzenia 
* body � tre�� odpowiedzi 
* blocked � ��danie aktywne lub zablokowane
* deleted � warto�� 1 dla usuni�tego ��dania  

##user � tabela u�ytkownik�w (mo�e zosta� zast�piona przez bibliotek�)
* userId � id
* username � nazwa u�ytkownika 
* password � has�o u�ytkownika 
* email � email u�ytkownika
* createdAt � data utworzenia u�ytkownika 

##header � nag��wki dla odpowiedzi z serwera 
* headerId � id
* key � klucz nag��wka 
* value � warto�� nag��wka 
* mockId � id mock`a
