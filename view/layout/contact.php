<article id="contact">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <h2>Me contacter</h2>

    <menu>
        <button id="buttonContact" class="focus">Contact</button>
        <button id="buttonFormulaire">Formulaire</button>
    </menu>

    <section class="contact">
        <h3>contact</h3>

        <ul>
            <li>
                <h4>titre</h4>
                <p>text</p>
            </li>
            <li>
                <h4>titre</h4>
                <p>text</p>
            </li>
            <li>
                <h4>titre</h4>
                <p>text</p>
            </li>
            <li>
                <h4>titre</h4>
                <p>text <a href="tel:+33683126067">Téléphone</a></p>
            </li>
        </ul>
    </section>
    <section class="formulaire hidden">
        <h3>Formulaire contacte</h3>

        <form id="formContact">
            <input type="text" name="nom" id="nom" placeholder="Nom" required>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
            <input type="email" name="mail" id="mail" placeholder="Mail" required>
            <textarea name="text" id="text" placeholder="text" required></textarea>
            <div class="g-recaptcha" data-sitekey="6Lc2pb8UAAAAANwT4eDni7RMNQoIryCYvMee25hh" data-callback="correctCaptcha" data-expired-callback="invalid"></div>
            <button type="submit" class="" disabled>Envoyer</button>
        </form>
        <script src="view/js/contact.js"></script>
    </section>
    <script src="view/js/choixContact.js"></script>
</article>