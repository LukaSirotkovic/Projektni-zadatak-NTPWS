<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="HTML5 Frontend Sučelje">
    <meta name="keywords" content="HTML5, zaglavlje, frontend, primjer">
    <meta name="author" content="Luka Sirotković">
    <link rel="stylesheet" href="kontakt.css">
    <title>HTML5 Zaglavlje</title>

</head>

<body>
    
    <main>
        <section class="map">
            <h2>Naša lokacija</h2>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2780.501452948683!2d15.958558616072303!3d45.81501097910673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d6b689f3d8f9%3A0xc1aee6c4b90c57f6!2sZagreb%2C%20Croatia!5e0!3m2!1sen!2shr!4v1699883915142!5m2!1sen!2shr"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </section>

        <section class="contact-form">
            <h2>Kontakt forma</h2>
            <form action="#" method="post">
                <div>
                    <label for="first-name">Ime *</label>
                    <input type="text" id="first-name" name="first-name" placeholder="Vaše ime..." required>
                </div>
                <div>
                    <label for="last-name">Prezime *</label>
                    <input type="text" id="last-name" name="last-name" placeholder="Vaše prezime..." required>
                </div>
                <div>
                    <label for="email">E-mail adresa *</label>
                    <input type="email" id="email" name="email" placeholder="Vaša e-mail adresa..." required>
                </div>
                <div>
                    <label for="country">Država</label>
                    <select id="country" name="country">
                        <option value="hr">Hrvatska</option>
                        <option value="rs">Srbija</option>
                        <option value="ba">Bosna i Hercegovina</option>
                        <option value="si">Slovenija</option>
                        <option value="other">Ostalo</option>
                    </select>
                </div>
                <div>
                    <label for="message">Opis</label>
                    <textarea id="message" name="message" placeholder="Vaš opis..." rows="5"></textarea>
                </div>
                <div>
                    <button type="submit">Pošalji</button>
                </div>
            </form>
        </section> 
    </main>
    

</body>

</html>