# ConnectAndVisualizeSecurity
 
## Les membres du projet:
- Lin Xingtong
- Zhang Anxian
--> Groupe 201

# Quels sont les différents services que nous avons mis en place ?
"/": la page de connexion
"user/register": page d'inscription
"user/contact": page de contact de l'utilisateur connecté
"user/contact/removecontact/{contactId}": suppression d'un contact
"user/contact/addcontact": page d'ajout de contacts
"user/mailer": page de qui permet d'envoyer un mail aux développeurs
"user/logout": deconnexion de l'utilisateur

# Quels sont les rôles dispognible ?
Nous avons pour le moment que 2 rôles, ROLE_USER et ROLE_ADMIN.
Le rôle ROLE_USER est attribué à tout le monde, contrairement au rôle ROLE_ADMIN qui n'est qu'attribué aux développeurs de l'application, c'est à dire Zhang Anxian et Lin Xingtong.

# Les bibliothèques Symfony qui ont été utilisé
- Security
- Form
- Mailer
- Validator (Constraints)
- Doctrine (ORM)
- PasswordHasher
- OptionResolver
- Routing
- User
- HttpFoundation
- Authentificator
- CSRF Token
