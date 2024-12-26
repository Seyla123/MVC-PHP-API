# PHP MVC Framework - Build Your Own Framework  

This project is about building a PHP MVC framework from scratch to understand how modern frameworks work under the hood. It's a great way to learn how to structure and organize your PHP projects while implementing essential features like routing, controllers, models, and views.  

## What’s This Project About?  

The idea behind this project is to create a lightweight framework that uses the **Model-View-Controller (MVC)** pattern, which is a common design used by most modern PHP frameworks like Laravel and Symfony. The focus is on building the core features from scratch, so you can understand how everything works and gain the skills to create well-structured and maintainable applications.  

## Key Features  

Here are some of the features that make up this framework:  

### Routing System  
A custom router to handle clean URLs and map them to specific controllers and methods. No more ugly PHP filenames in your URLs.  

### MVC Architecture  
The framework separates the logic into three components:  
- **Models**: For handling the data and database logic.  
- **Views**: For rendering HTML and keeping your presentation code organized.  
- **Controllers**: To process user requests and connect models to views.  

### Middleware  
Add layers to process incoming requests or outgoing responses (e.g., for authentication or logging).  

### Templating  
A basic templating system that lets you reuse and organize HTML files while keeping things dynamic.  

### Error Handling  
Graceful error management with custom exceptions so you can debug easily during development.  

### Environment Configuration  
Use an `.env` file to keep sensitive information like database credentials out of your codebase.  

### CRUD Operations  
Full Create, Read, Update, Delete functionality to show how the framework works with databases.  

### Reusable Design  
The framework is designed to be modular and reusable so that it can be extended or adapted for bigger projects.  
