
<!DOCTYPE html>
<html lang="ro-RO" xml:lang="ro-RO" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>{{$appName}} - User Guide</title>
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
    <h1>User Guide</h1>
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
        Documentul descrie interacțiunea utilizatorului cu aplicația. Adițional, user guide-ul este disponibil și ca document în format HTML, la adresa :  <a href=https://sia-music-project.000webhostapp.com/music-engine/userguide.html>link</a> . 
    </p>

</section>

<section typeof="sa:Introducere" id="introducere" role="doc-introduction">
    <h2><span>2) </span>Instrucțiuni pentru un utilizator obișnuit</h2>
    <section id="cerinta">
        <h3><span>2.1) </span>Login/Register</h3>
        <p>
            Se recomandă ca un utilizator sa fie logat la sistem cand folosește aplicația.<br>
            Utilizatorul în momentul în care intra pe pagina principala a aplicației acesta poate observa  în colțul din dreapta sus butonul de login 
            unde isi poate creea un cont sau se poate autentifica pe acplicația noastră. În momentul în care utilizatorul este redirectionalt pe pagina 
            de login acesta observa un chenar alb de unde poate alege daca doreste sa se autentifice sau să se înregistreze la sistem.<br>
            <a href="https://imgur.com/BAjrfRr">screenshot-login</a><br>
            <a href="https://imgur.com/ZpEdani">screenshot-register</a><br>
        </p>
        <h3><span>2.2) </span>Compare-normal</h3>
        <p>
            Pentru a compara melodii, utilizatorul trebuie sa intre pe pagina de comparare, si poate realiza acest lucrtu apasând pe butonul 
            "Compare songs!" de pe pagina "Home".<br>
            Odata ce utilizatorul este redirecționat pe pagina de "Compare" utilizatorului îi apare pe ecran un formular în care trebuie să 
            introduca numele melodiilor și numele autorilor.  <a href="https://imgur.com/RPJjiP0">screenshot-compare-form</a><br>
            În momentul în care utilizatorului completeaza formularul și apasă pe butonul "SEND THE INFORMATION" i se calculeaza similaritatea 
            dintre cele doua melodii, pe baza informațiilor din <a href="https://www.last.fm/music">Last.fm API</a> (daca melodia nu se afla pe Last.fm atunci similaritatea nu poate fi calculată și se vor cere alte informații).<br>
            <a href="https://imgur.com/URwTt6p">screenshot-compare-completed</a><br>
            <a href="https://imgur.com/lcAVhX2">screenshot-compare-result</a><br>
            După ce similaritatea este calculată utilizatorul poate merge pe pagina de "Home" sau să calculeze altă similaritate. 
        </p>
        <h3><span>2.3) </span>Compare-API</h3>
        <p>
            Această fereastră este folosită ca un testing pentru programatori, e folosită pentru a testa REST API-ul cu care se compară melodiile.<br>
            Pentru a accesa aceasta zonă utilizatorul trebuie să apese pe butonul "API REST" de pe pagina "HOME". funcționalitățile sunt aceleași ca și la pagina de comparare.<br>
            De asemenea apăsând pe butonul "TEST /api/get-songs" se vor afișa pe ecran toate melodiile din baza de date in format JSON. 
            <a href="https://imgur.com/cBE03tv">screenshot-compare-form</a><br>
            <a href="https://imgur.com/6Hdhjvo">screenshot-compare-completed</a><br>
            <a href="https://imgur.com/fjN4zX6">screenshot-compare-result</a><br>
            <a href="https://imgur.com/goJO9If">screenshot-compare-testAPI1</a><br>
            <a href="https://imgur.com/DQVAIgM">screenshot-compare-testAPI2</a><br>
        </p>
        <h3><span>2.4) </span>Recomandations</h3>
        <p>
            Pentru ca utilizatorul sa primească recomandări trebuie de pe pagina "Home" să apese pe butonul "Get Recomandations!".<br>
            Odata ce utilizatorul este redirecționat pe pagina de recomandari el vede un formular unde poate are accesibilitate la diverse cerințe (primele două
            câmpuri din formular trebuie completat obligatoriu). În 
            funcție de ce completează în acest formular, utilizatorul primește anumite recomandări din baza de date. Aceste recomandări vor 
            fi postate pe Feed-ul utilizatorului însoțit de tagul #saudio.<br>
            <a href="https://imgur.com/S006FPE">screenshot-recomandation-form1</a><br>
            <a href="https://imgur.com/njud3v5">screenshot-recomandation-form2</a><br>
            <a href="https://imgur.com/bI8uVfU">screenshot-recomandation-completed</a><br>
            <a href="https://imgur.com/FowTEqc">screenshot-recomandation-result</a><br>
        </p>
        <h3><span>2.5) </span>Feed</h3>
        <p>
            Pentru ca utilizatorul sa ajungă pe pagina de "Feed", trebuie ca de pe pagina "Home" să apese pe butonul "My Feed".<br>
            Acolo vor fi postările cu recomandările pe care acesta le-a primit în trecut dar și gândurile pe care acesta le poate posta.<br>
            O postare poate fi ștearsă dacă se apară pe butonul "Remove" din dreptul fiecărei postări.<br>
            <a href="https://imgur.com/haawwtF">screenshot-feed1</a><br>
            <a href="https://imgur.com/13VrhM9">screenshot-feed2</a><br>
            <a href="https://imgur.com/2TrLNsr">screenshot-feed3</a><br>
        </p>
        <h3>Atenție! Un user poate vedea feed-ul doar daca e logat la aplicație.
        Restul funcționalităților pot fi utilizate și fără a fi logat.<br>
            De asemenea comparările simple merg pe un API de la Last.fm pe când celelalte funcționalitați folosesc un API propriu.</h3>
    </section>

</section>

<section id="implementare">
    <h2><span>3) </span>Instrucțiuni pentru un administrator</h2>
    <p>
        Un administrator vede un buton în plus față de ceilalți utilizatori, butonul "Admin", care îl redirecționează pe utilizator la un meniu 
        special in care poate modifica baza de date.<br>
        <a href="https://imgur.com/1ToF0QT">screenshot-admin-home</a><br>
        <a href="https://imgur.com/kkT1iq2">screenshot-admin-menu</a><br>
        În acest meniu special pentru administrator se pot face urmatoarele funcționalități.<br>
        -- Users: pe aceasta fereastră se va genera un tabel din baza de date cu informații despre fiecare utilzator înregistrat în DB. 
        <a href="https://imgur.com/VWv4kfy">screenshot-admin-users</a><br>
        -- Songs: pe aceasta fereastră se va genera un tabel din baza de date cu informații despre fiecare melodie înregistrată în DB. 
        <a href="https://imgur.com/aghJmQM">screenshot-admin-songs</a><br>
        -- Import .CSV: pe această fereastră adminul poate importa un fișier .csv in care se afla date despre diverse melodii (avand un anumit format) 
        iar melodiile din fișier vor fi înregistrate în baza de date (în caz că nu există deja). <a href="https://imgur.com/nx4XAni">screenshot-admin-importCSV</a><br>
        -- Add New Song: in această fereastră adminului îi este generat un formular cu care poate adăuga melodii noi în baza de date (toate câmpurile din acest formular sunt obligatorii).
        <a href="https://imgur.com/UokQ74f">screenshot-admin-addSong1</a><br>
        <a href="https://imgur.com/t52Kdk9">screenshot-admin-addSong2</a><br>
    </p>
</section>
<section id="ref-ResurseExterne">
    <h2><span>4) </span>Conținut extern</h2>
    <p>
        Ca resurse externe, au fost utilizate următoarele :
    </p>
    <ul>
        <li>
            <a href="#ref-Scholarly">Scholarly HTML</a>, cu ajutorul căruia a fost realizat user guide-ului.
        </li>
        <li>
            <a href="#ref-Imgur">Imgur</a>, site pe care au fost încărcate screenshot-urile.
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
                <a href="https://w3c.github.io/scholarly-html/ ">Raport Scholarly HTML</a>
            </cite>
        </dd>
        <dt id="ref-Social">Social Media</dt>
        <dd property="schema:citation" typeof="schema:Webpage">
            <cite property="schema:name">
                <a href="https://www.youtube.com/watch?v=HwPjBpMiU0o  ">Referință Social Media</a>
            </cite>
        </dd>
        <dt id="ref-Login">Login</dt>
        <dd property="schema:citation" typeof="schema:Webpag">
            <cite property="schema:name">
                <a href="https://www.youtube.com/watch?v=L5WWrGMsnpw  ">Referință Login</a>
            </cite>
        </dd>
    </dl>
</section>

</body>

</html>