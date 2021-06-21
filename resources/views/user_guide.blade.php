
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
        Documentul descrie interacțiunea utilizatorului cu aplicatia.
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
            <a href="https://imgur.com/MHPgpFi">screenshot-login</a><br>
            <a href="https://imgur.com/sHofB8M">screenshot-register</a><br>
        </p>
        <h3><span>2.2) </span>Compare-normal</h3>
        <p>
            Pentru a compara melodii, utilizatorul trebuie sa intre pe pagina de comparare, si poate realiza acest lucrtu apasând pe butonul 
            "Compare songs!" de pe pagina "Home".<br>
            Odata ce utilizatorul este redirecționat pe pagina de "Compare" utilizatorului îi apare pe ecran un formular în care trebuie să 
            introduca numele melodiilor și numele autorilor.  <a href="https://imgur.com/JMcKSgr">screenshot-compare-form</a><br>
            În momentul în care utilizatorului completeaza formularul și apasă pe butonul "SEND THE INFORMATION" i se calculeaza similaritatea 
            dintre cele doua melodii, pe baza informațiilor din baza de date (daca melodia nu se afla in baze de date nu pot fi facute calcule).<br>
            <a href="https://imgur.com/qiE6WZZ">screenshot-compare-completed</a><br>
            <a href="https://imgur.com/BvrStwA">screenshot-compare-result</a><br>
            După ce similaritatea este calculată utilizatorul poate merge pe pagina de "Home" sau să calculeze altă similaritate. 
        </p>
        <h3><span>2.3) </span>Compare-API</h3>
        <p>
            Pentru a compara melodii folosind servicii Rest-API utilizatorul trebuie să apese pe butonul "API REST" de pe pagina home unde poate 
            face acelasi lucru ca pe pagina de compare, numai ca se foloseste un REST API.<br>
            <a href="https://imgur.com/YTf5vdi">screenshot-compare-form</a><br>
            <a href="https://imgur.com/d51xB8O">screenshot-compare-completed</a><br>
            <a href="https://imgur.com/BkIU1DD">screenshot-compare-result</a><br>
        </p>
        <h3><span>2.4) </span>Recomandations</h3>
        <p>
            Pentru ca utilizatorul sa primească recomandări trebuie de pe pagina "Home" să apese pe butonul "Get Recomandations!".<br>
            Odata ce utilizatorul este redirecționat pe pagina de recomandari el vede un formular unde poate vedea diverse cerințe (primele două
            câmpuri din formular trebuie completat obligatoriu). În 
            funcție de ce completează în acest formular, utilizatorul primește anumite recomandări din baza de date. Aceste recomandări vor 
            fi postate pe Feed-ul utilizatorului însoțit de tagul #saudio.<br>
            <a href="https://imgur.com/qV66UeT">screenshot-recomandation-form1</a><br>
            <a href="https://imgur.com/z7dY6ry">screenshot-recomandation-form2</a><br>
            <a href="https://imgur.com/qasVZBS">screenshot-recomandation-completed</a><br>
            <a href="https://imgur.com/CJ4vcEu">screenshot-recomandation-result</a><br>
        </p>
        <h3><span>2.5) </span>Feed</h3>
        <p>
            Pentru ca utilizatorul sa ajungă pe pagina de "Feed", trebuie ca de pe pagina "Home" să apese pe butonul "My Feed".<br>
            Acolo vor fi postările cu recomandările pe care acesta le-a primit în trecut dar și gândurile pe care acesta le poate posta.<br>
            O postare poate fi ștearsă dacă se apară pe butonul "Remove" din dreptul fiecărei postări.<br>
            <a href="https://imgur.com/QnOksvP">screenshot-feed1</a><br>
            <a href="https://imgur.com/B3sGMJj">screenshot-feed2</a><br>
            <a href="https://imgur.com/QxPioyA">screenshot-feed3</a><br>
        </p>
        <h3>Atenție! Un user poate vedea feed-ul doar daca e logat la aplicație.
        Restul funcționalităților pot fi utilizate și fără a fi logat.</h3>
    </section>

</section>

<section id="implementare">
    <h2><span>3) </span>Instrucțiuni pentru un administrator</h2>
    <p>
        Un administrator vede un buton în plus față de ceilalți utilizatori, butonul "Admin", care îl redirecționează pe utilizator la un meniu 
        special in care poate modifica baza de date.<br>
        <a href="https://imgur.com/EconRRN">screenshot-admin-home</a><br>
        <a href="https://imgur.com/CGVLJhi">screenshot-admin-menu</a><br>
        În acest meniu special pentru administrator se pot face urmatoarele funcționalități.<br>
        -- Users: pe aceasta fereastră se va genera un tabel din baza de date cu informații despre fiecare utilzator înregistrat în DB. <a href="https://imgur.com/0DOy2ce">screenshot-admin-users</a><br>
        -- Songs: pe aceasta fereastră se va genera un tabel din baza de date cu informații despre fiecare melodie înregistrată în DB. <a href="https://imgur.com/NKAvnvs">screenshot-admin-songs</a><br>
        -- Import .CSV: pe această fereastră adminul poate importa un fișier .csv in care se afla date despre diverse melodii (avand un anumit format) 
        iar melodiile din fișier vor fi înregistrate în baza de date (în caz că nu există deja). <a href="https://imgur.com/s4RzCWe">screenshot-admin-importCSV</a><br>
        -- Add New Song: in această fereastră adminului îi este generat un formular cu care poate adăuga melodii noi în baza de date (toate câmpurile din acest formular sunt obligatorii).
        <a href="https://imgur.com/9miVOBE">screenshot-admin-importCSV</a><br>
        <a href="https://imgur.com/VBr3fBp">screenshot-admin-importCSV</a><br>
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