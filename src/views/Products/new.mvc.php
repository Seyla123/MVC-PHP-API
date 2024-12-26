{% extends "base.mvc.php" %}

{% block title %}New Products{% endblock %}

{% block body %}

<h1>New Product</h1>

<form method="post" action="/products/create">

<?php require dirname(__DIR__) . "/views/Products/form.mvc.php"; ?>

</form>

{% endblock %}