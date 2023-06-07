# Test-bs

## Pourquoi ce projet ?
J'ai fait cette application pour un test technique lors de ma recherche d'entreprise pour une alternance CDA.  
L'énoncé se trouve dans le dossier data.  

Je devait faire ce test soit en Java soit dans un langage ou j'étais plus à l'aise, j'ai donc décidé de le faire en PHP.

## Instalation :
Ce projet a été fait en php 8, il faudra simplement installer Composer pour l'autoloader.  

## Quelques explications :
 - **Le temps passé sur ce projet :**  
     Environs 19h, entre 15 et 16h pour la totalité du projet et 3 ou 4 heures de plus pour refactoriser plusieurs choses,  
     Dans les 15 heures de développement, je compte également la compréhension de l'énoncé, notemment les règles pour la définition du tarif et de conditions de taxations, j'ai du bien mettre à l'écrit les différentes règles pour ne pas me tromper.  
 - **La refactorisation :**  
     Mes entités n'était pas bonnes, elles faisaient trop de choses et n'étaient pas vraiment fonctionnelles d'un point de vu POO,
     J'ai donc décidé d'organiser mon code d'une manière différente qui ressemble beaucoup plus à une application symfony.
     J'ai opté pour la création de plusieurs class :  
     &nbsp;&nbsp;&nbsp;&nbsp;- Les class Repository qui seront en charge d'aller chercher les données dans les fichiers data.  
     &nbsp;&nbsp;&nbsp;&nbsp;- Les class Entity qui vont recevoir les données récupérées par les class Repository et construire l'entité voulue.  
     &nbsp;&nbsp;&nbsp;&nbsp;- Les class Controller qui vont décider de ce qui sera envoyé à l'index pour l'affichage en fonction des données fournies par les class Entity.  
