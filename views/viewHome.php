<?php $this->title = 'Projet Blog'; ?>

<?php $this->header = '<h1>Ulrich Huet</h1>'; ?>

<?php $this->subheader = '<span class="subheading">Développeur web en formation</span>'; ?>

<?php $this->button = '<a href="docs/CV_HUET_portfolio.pdf" class="btn btn-secondary" target="_blank">Télécharger CV</a>'; ?>


<!-- Contact Form -->
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        <p>Si vous désirez m'envoyer un message, remplissez le formulaire ci-dessous et je vous répondrais au plus vite !</p>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Nom</label>
                    <input type="text" class="form-control" placeholder="Nom" id="name" required data-validation-required-message="Entrez votre nom.">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Entrez votre adresse email.">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Message</label>
                    <textarea rows="5" class="form-control" placeholder="Votre Message" id="message" required data-validation-required-message="Entrez un message."></textarea>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-secondary" id="sendMessageButton">Envoyer</button>
            </div>
        </form>
    </div>
</div>
