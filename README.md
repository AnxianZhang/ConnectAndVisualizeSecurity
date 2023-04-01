# ConnectAndVisualizeSecurity
 
## Les membres du projet (groupe 201):
- Lin Xingtong 
- Zhang Anxian  <br>

# Quels sont les différents services que nous avons mis en place ?
- "/": la page de connexion <br>
- "user/register": page d'inscription <br>
- "user/contact": page de contact de l'utilisateur connecté <br>
- "user/contact/removecontact/{contactId}": suppression d'un contact <br>
- "user/contact/addcontact": page d'ajout de contacts <br>
- "user/mailer": page de qui permet d'envoyer un mail aux développeurs <br>
- "user/logout": deconnexion de l'utilisateur <br>

# Quels sont les rôles disponibles ?
Nous avons pour le moment que 2 rôles, ROLE_USER et ROLE_ADMIN.
Le rôle ROLE_USER est attribué à tout le monde, contrairement au rôle ROLE_ADMIN qui n'est qu'attribué aux développeurs de l'application, c'est à dire Zhang Anxian et Lin Xingtong.

# Les bibliothèques Symfony qui ont été utilisé
- Security <br>
- Form <br>
- Mailer <br>
- Validator (Constraints) <br>
- Doctrine (ORM) <br>
- PasswordHasher <br>
- OptionResolver <br>
- Routing <br>
- User <br>
- HttpFoundation <br>
- Authentificator <br>
- CSRF Token <br>
