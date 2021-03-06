
<!DOCTYPE html>
<html lang="ro-RO" xml:lang="ro-RO" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>{{$appName}} - Scholarly HTML</title>
    <link rel="stylesheet" href="{{$appUrl}}/load_resource.php?file=scholarly.css&type=css">
</head>

<body prefix="schema: http://schema.org">
<div class="navbar">
    <a href="{{$appUrl}}/home">
        <img src="{{$appUrl}}/load_resource.php?file=logo.png&type=image" alt="logo" class="logo" width="200" height="62">
    </a>
    <div class="buttons">
        <button class="btn-1" onclick="window.location.href='{{$appUrl}}/home'"><strong>Home</strong></button>
    </div>
</div>
<header>
    <h1>Raport ScholarlyHTML</h1>
</header>
<div role="contentinfo">
    <dl>
        <dt>   Autori</dt>
        <dd>
            <a href="https://github.com/victorwenom123/Proiect-Tehnologii-Web">Andrieș Dumitru-Andrei </a> &amp;
            <a href="https://github.com/victorwenom123/Proiect-Tehnologii-Web">Fârțade Cristian </a> &amp;
            <a href="https://github.com/victorwenom123/Proiect-Tehnologii-Web">Stanciu Victor-Nicolae</a>
        </dd>
    </dl>
</div>
<section typeof="sa:Abstract" id="abstract" role="doc-abstract">
    <h2><span>1) </span>Abstract</h2>
    <p>
        Scholarly HTML reprezintă un format cu un domeniu specific dezvoltat în întregime pe baza unor standarde deschise ce permite schimbul interoperabil de articole de tip "scholarly" într-o manieră ce este compatibilă cu browsere utilizabile.
    </p>
    <p>
        Documentul descrie atât aspectele esențiale referitoare la funcționalitățile esențiale ale aplicației, cât și cele privind interacțiunea cu utilizatorul. De asemenea, documentul descrie maniera de organizare a sarcinilor și etapele de evoluție a proiectului.
    </p>

</section>

<section typeof="sa:Introducere" id="introducere" role="doc-introduction">
    <h2><span>2) </span>Introducere</h2>
    <section id="cerinta">
        <h3><span>2.1) </span>Cerința</h3>
        <p>
            Să se implementeze o aplicație Web capabilă – pe baza unui API REST sau GraphQL propriu – să detecteze similaritatea dintre conținuturi sonore disponibile via API-uri audio specializate. Pentru calculul similarității, se vor considera (meta-)date precum
            titlul, descrierea, lungimea, autorul, termenii de conținut (tag-urile), comentariile utilizatorilor și altele. Aplicația va oferi suport pentru căutare multi-criterială și va sugera melodii de interes în funcție de preferințe și starea
            de spirit (mood), localizarea geografică, moment de timp, factori demografici, anturaj. Aceste recomandări vor fi sugerate și prin intermediul unui flux de știri RSS și plasate pe o rețea socială pe baza hashtag-ului #saudio.
        </p>
    </section>
    <section id="structura">
        <h3><span>2.2) </span> Structura</h3>
        <p>
            În primul rând, a priori, am ajuns la un consens cu privire la structura proiectului, alcătuit din mai multe pagini și opțiuni specifice cerinței în cauză precum "Home", "Login/Sign up", "Report", "Feed", "Compare", "Recommandations", "Admin", "Api Rest"(Unit Testing).
        </p>
    </section>

</section>

<section id="implementare">
    <h2><span>3) </span>Implementare</h2>
    <p>
        Am dezvoltat o interfață grafică HTML5 pentru utilizatorul care va avea la dispoziție funcționalități precum: înregistrare, autentificare, compararea a două melodii, accesul la o rețea socială personalizată sau la recomandări de melodii în funcție de criteriile precizate.

    </p>
    <p>
        Am respectat principiul responsiv specific pentru designul web, încât aplicația este accesibilă și utilizabilă de pe orice platformă, având o interfață atractivă pentru utilizator și în conformitate cu tema aleasă, cu domeniul muzicii (reprezentând, de
        altfel, motivul alegerii ideii de design).
    </p>
    <p>Am realizat partea grafică pentru funcționalitățile esențiale ale aplicației: </p>
    <ul>
        <li>Register - pentru înregistrare;</li>
        <li>Login - pentru autentificare;</li>
        <li>Compare songs - pentru compararea a două melodii;</li>
        <li>Get recommandations - pentru a primi recomandări de melodii în funcție de anumite criterii;</li>
        <li>Feed - o rețea socială în care utilizatorul poate primi recomandări sau poate comunica cu alți utilizatori prin intermediul tweet-urilor.</li>
        <li>Admin- un modul de administrare prin care utilizatorul poate importa fisiere csv cu melodii, poate importa melodii prin intermediul anumitor date sau vizualiza melodii sau utilizatori.</li>
        <li>API Rest(Unit Testing)- un modul de comparare a melodiilor ce poate deservi ca unit testing sau teste destinate îndeosebi programatorilor și ce pune la dispoziție toate melodiile prin intermediul api-urilor audio. </li>

    </ul>
    <p>În primul rând, utilizatorul are la dispoziție pagina "Home" ( <a href="https://imgur.com/1ToF0QT">screenshot</a> ) .</p>
    <p>În ceea ce privește interacțiunea aplicație-utilizator utilizatorul beneficiază de următoarele opțiuni: poate accesa "Compare songs" ( <a href="https://imgur.com/Ef2UmmU">screenshot</a> ) pentru a completa un formular, ce
        îl va direcționa spre o pagină care va afișa rezultatul comparației ( <a href="https://imgur.com/lcAVhX2">screenshot</a> ), cu melodii dintr-un API public specializat intitulat LastFM (<a href="https://www.last.fm/music">link</a>). Acest formular conține date precum: numele, autorul, durata, tag-urile, genul, cât și comentariile melodiilor.
    </p>
    <p>Analog, poate accesa "Get recommandations" ( <a href="https://imgur.com/bI8uVfU">screenshot</a> ), pentru a primi anumite recomandări pe o nouă pagină ce reprezintă o rețea socială . Va completa un formular conținând
        următoarele date: preferințele, starea de spirit, locații geografice, data apariției melodiei, vârsta, tipul habitatului, nivelul de educație, tipul zonei și compatibilitatea melodiei cu anturajul.
    </p>
    <p>Atât autentificarea ( <a href="https://imgur.com/BAjrfRr">screenshot</a> ), cât și înregistrarea ( <a href="https://imgur.com/ZpEdani">screenshot</a> ) au în vedere un nume de utilizator și o parolă. În plus, signup solicită o adresă de email.
    </p>De asemenea, prin intermediul API-ului propriu, cu ajutorul API Rest, pentru programatori, avem la dispoziție opțiunea de unit testing pentru comparare de melodii (<a href="https://imgur.com/6Hdhjvo?fbclid=IwAR2_rTq7ZzA8_77b7Nu6_TR1p80mCY7WT4Gr94ZiQGsmNDe1jVqCibdan_c">screenshot</a> ) și disponibilitatea via API a melodiilor (<a href="https://imgur.com/DQVAIgM">screenshot</a>).
    <p>
    </p>
    <p>Rețeaua socială ( <a href="https://imgur.com/2TrLNsr">screenshot</a> ) va afișa recomandări de melodii, dar va oferi și posibilitatea utilizatorului de a comunica cu alți utilizatori prin intermediul comentariilor.</p>
    <p>Modulul de administrare pune la dispoziție următoarele opțiuni: import csv (screenshot), import de date pentru o melodie (screenshot) si vizualizarea utilizatorilor ( ) si a pieselor din baza de date() .
    </p>
    
    <p>În ceea ce privește soluționarea problemelor întampinate, pentru o așezare în pagină mai bună, se remarcă redimensionarea elementelor paginii, a butoanelor, a containerelor și a elementelor de text și input în funcție de dimensiunile viewport-ului.
        (cu ajutorul "vw", "vh", "vmin" și "vmax"). În ceea ce privește așezarea elementelor pe diferite dispozitive, a fost realizată crearea de layout-uri diferite pentru acestea, încât, de pildă, pe sisteme Desktop, elementele sunt așezate
        diferit comparativ cu așezarea lor pe telefoane. </p>
    <p>În ceea ce privește arhitectura proiectului, a fost utilizată structura MVC conform cerinței, având la dispoziție atat clase cu numele Model, View, Controller, cât și astfel de namespace-uri. Structura de tip OOP conferă codului o organizare bună.
    </p>
    <p>De asemenea, pentru structura MVC, avem fișierul index.php pentru URL-urile definite în cod ce conține rutele necesare pentru transmiterea/recepționarea datelor și a vizualizării paginilor. Simultan, avem un fișier cu rolul de Loader (load_resource.php) în care sunt incluse toate namespace-urile necesare.
    </p>
    <p>Ca tehnică de programare utilizată pentru register/login, s-a utilizat AjaxCall (intenția unui AJAX este de a nu fi nevoie ca pagina să fie reîncărcată la fiecare acțiune a utilizatorului și de a conferi rapiditate în ceea ce privește accesul la site). De asemenea, printre serviciile web utilizate, se enumeră Json, care facilitează utilizarea specifică pentru Unit Testing-ul implementat.
    </p>
    <p>În ceea ce privește progresul implementării aplicației, au fost stabilite a priori sarcini pentru fiecare membru al echipei. Inițial, au fost finalizate funcționalitățile pentru compare, register și login. Ulterior, a fost creat modulul de administrare al aplicației specific adminului, urmat de recomandări și social feed. Ca bonus, a fost realizat Unit Testing-ul. Integrarea fiecărei componente a fost realizată pe parcurs. De asemenea, adițional, având în vedere că, inițial, comparația a fost pentru API-ul propriu, am implementat compararea pentru LastFM.
    </p>
    <p>Progresul a fost unul dependent de rezolvarea problemelor, în marea lor majoritate cauzate de path-urile route-urilor și de greșeli la nivel micro în cadrul metodelor.
    </p>
    <p>Pentru comenzile SQL, a fost utilizată protecția împotriva SQLInjection prin sanitizarea input-ului în comenzi precum, de pildă, utilizarea "addslashes".
    </p>
    <p>De asemenea, au fost utilizate următoarele: pentru render, ca template engine, BladeOne; pentru partea de generare de formulare, formBuilder și, simultan, o librărie specifică generării de feed-uri rss pentru recomandări per utilizator.
    </p>
    <p>Pentru host a fost folosit următorul host - <a href=https://000webhost.com/>link</a> . Pentru aplicația în cauză, avem următorul URL - <a href=https://sia-music-project.000webhostapp.com/music-engine/>link</a> .
    </p>
    <p>Ca management al codului, pe lângă clasele corespunzătoare MVC (pentru Controller, Admin, Home etc; pentru Model, Recomend sau Wall; iar View fiind clasa copil pentru RenderEngine ce a fost concepută drept clasă care extinde BladeOne), avem namespace-ul Middleware, ce conține, în principal, clase corespunzătoare prelucrării datelor din baza de date, a view-urilor, dar și metode corespunzătoare pentru fișiere csv.
    </p>
    <p>Pentru partea de API Rest, am utilizat http_query pentru un request. De asemenea, avem metodele proprii pentru request-uri și am utilizat POST pentru create și update.
    </p>
    <p>Pentru arhitectura aplicației, avem următoarele diagrame UML : <a href=https://imgur.com/unUIGPS?fbclid=IwAR0Q6rwcl300lP1_5LTFxlRg7fWElHcdFjrvx8-CAXT-PqKijApcwQI4a7A>link</a> .
    </p>
    <p>Adițional, raportul este disponibil și ca document în format HTML, la adresa :  <a href=https://sia-music-project.000webhostapp.com/music-engine/scholarly.html>link</a> . 
    </p>

</section>
<section id="ref-ResurseExterne">
    <h2><span>4) </span>Conținut extern</h2>
    <p>
        Ca resurse externe, au fost utilizate următoarele :
    </p>
    <ul>
        <li>
            <a href="#ref-Scholarly">Scholarly HTML</a>, cu ajutorul căruia a fost realizat raportul.
        </li>
        <li>
            <a href="#ref-Imgur">Imgur</a>, site pe care au fost încărcate screenshot-urile.
        </li>
        <li>
            <a href="#ref-000-webhost">000-webhost</a>,host gratuit cu ajutorul căruia am obținut URL-ul în cauză al aplicației .
        </li>
    </ul>
</section>
<section id="Referinte">
    <h2><span>5) </span>Referințe</h2>
    <dl>
        <dt id="ref-Developer">Developer</dt>
        <dd property="schema:citation" typeof="schema:Webpage">
            <cite property="schema:name">
                <a href="https://developer.mozilla.org/en-US/docs/Web/HTML ">Referință Developer</a>
            </cite>
        </dd>
        <dt id="ref-W3schools">W3schools</dt>
        <dd property="schema:citation" typeof="schema:Webpage">
            <cite property="schema:name">
                <a href="https://www.w3schools.com/html/ ">Referință W3schools</a>
            </cite>
        </dd>
        <dt id="ref-Imgur">Imgur</dt>
        <dd property="schema:citation" typeof="schema:Webpage">
            <cite property="schema:name">
                <a href="https://imgur.com ">Referință Imgur</a>
            </cite>
        </dd>
        <dt id="ref-Youtube1">Pagină Home</dt>
        <dd property="schema:citation" typeof="schema:Webpage">
            <cite property="schema:name">
                <a href="https://www.youtube.com/watch?v=CZTCciHE72I  ">Referință pagina Home</a>
            </cite>
        </dd>
        <dt id="ref-CreateLogo">Creare logo</dt>
        <dd property="schema:citation" typeof="schema:Webpage">
            <cite property="schema:name">
                <a href="https://www.youtube.com/watch?v=f-jopUTj5_Y ">Referință creare logo</a>
            </cite>
        </dd>
        <dt id="ref-Scholarly">Raport Scholarly HTML</dt>
        <dd property="schema:citation" typeof="schema:Webpage">
            <cite property="schema:name">
                <a href="https://w3c.github.io/scholarly-html/ ">Scholarly HTML</a>
            </cite>
        </dd>
        <dt id="ref-Social">Social Media</dt>
        <dd property="schema:citation" typeof="schema:Webpage">
            <cite property="schema:name">
                <a href="https://www.youtube.com/watch?v=HwPjBpMiU0o  ">Referință Social Media</a>
            </cite>
        </dd>
        <dt id="ref-Login">Login</dt>
        <dd property="schema:citation" typeof="schema:Webpage">
            <cite property="schema:name">
                <a href="https://www.youtube.com/watch?v=L5WWrGMsnpw  ">Referință Login</a>
            </cite>
        </dd>
        <dt id="ref-Injection">PrevenireSQLInjection</dt>
        <dd property="schema:citation" typeof="schema:Webpage">
            <cite property="schema:name">
                <a href="https://en.wikipedia.org/wiki/SQL_injection ">Referință Prevenire SQL Injection</a>
            </cite>
        </dd>
        <dt id="ref-MVC">MVC</dt>
        <dd property="schema:citation" typeof="schema:Webpage">
            <cite property="schema:name">
                <a href="https://www.udemy.com/course/php-mvc-from-scratch/?referralCode=79E182F5C6C90EB6A3FE ">Referință MVC</a>
            </cite>
        </dd>
        <dt id="ref-Ajax">Ajax</dt>
        <dd property="schema:citation" typeof="schema:Webpage">
            <cite property="schema:name">
                <a href="https://stackoverflow.com/questions/8567114/how-to-make-an-ajax-call-without-jquery ">Referință Ajax</a>
            </cite>
        </dd>
        <dt id="ref-RESTAPI">ReferintaRestAPI</dt>
        <dd property="schema:citation" typeof="schema:Webpage">
            <cite property="schema:name">
                <a href="https://www.leaseweb.com/labs/2015/10/creating-a-simple-rest-api-in-php/ ">Referință API REST</a>
            </cite>
        </dd>
        <dt id="ref-BladeOne">Referință BladeOne</dt>
        <dd property="schema:citation" typeof="schema:Webpage">
            <cite property="schema:name">
                <a href="https://github.com/EFTEC/BladeOne">Referință BladeOne</a>
            </cite>
        </dd>
        <dt id="ref-LastFM">Referință LastFM</dt>
        <dd property="schema:citation" typeof="schema:Webpage">
            <cite property="schema:name">
                <a href="https://www.last.fm/music">Referință LastFM</a>
            </cite>
        </dd>
    </dl>
</section>

</body>

</html>