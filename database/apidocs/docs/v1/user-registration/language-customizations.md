###Language Customizations

This hook provides you a way to display the labels, placeholders, validation messages and error messages for forms in your local language.

The below is a sample implementation based on French. This is meant to be a template that you can modify to use with your desired language and is not restricted to any language.

Include your language file in a script tag on your web page.
```
<script src= "js/french.js"></script>
  
```


##Sample French

Below is a sample locale file called "french.js"

It contains key-value pairs for labels, placeholders, validationMessages etc.
keys are properties and values are objects/array of objects in your local language.
```
var french = {  
			"labels": { "emailid":  "Adresse e-mail",   "password":  "Mot de passe"  },
			"placeholders": { "emailid":  "Entrez votre e-mail id",   "password":  "Entrez votre mot de passe" },
			"validationMessages": [
				{   "rule":  "required",   "message":  "Le champ %s n'est requis."  },
				{   "rule":  "valid_email",   "message":  "Le champ %s doit contenir une adresse e-mail valide."  }
				],
			"errorMessages": [
				{   "code": 966,   "message":  "Nom d'utilisateur Mot de passe sont erron s",   "description":  "Nom d'utilisateur Mot de passe sont erron s, veuillez entrer la bonne combinaison de nom d'utilisateur Mot de passe"  },
				{   "code": 967,   "message":  "Id d'e-mail n'est pas format  valide",   "description":  "Id d'e-mail n'est pas format  valide"  },
				{   "code": 901,   "message":  "La cl  de l'API n'est pas valide",   "description":  "La cl  API LoginRadius fournis est non valide ou n'est pas autoris e, veuillez utiliser une cl  d'API LoginRadius valide ou v rifiez la cl  d'API pour votre compte LoginRadius."  }
		] }
     
```
##Hook
Then call this hook with the name of your locale object as a parameter before LoginRadiusRaaS.init.

```

      LoginRadiusRaaS.$hooks.setLocaleBasedInfo(french);

```

Now include code for your form(for eg: login form) in the script tag of your web page as per the documentation [here](/api/v1/user-registration/user-registration-getting-started#login5) 
