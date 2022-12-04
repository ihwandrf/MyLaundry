<?php

function template_header()
{
    echo <<<EOT
    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="style.css" />
    <title>MyLaundry Dashboard</title>
  </head>
  body>
  <section id="menu">
    <div class="logo">
      <img src="/logo.jpg" alt="" />
      <h2>MyLaundry</h2>
    </div>
    <div class="items">
      <li>
        <span class="material-icons"> pie_chart </span>
        <a href="#">Dashboard</a>
      </li>
      <li>
        <span class="material-icons"> pie_chart </span>
        <a href="#">Dashboard</a>
      </li>
      <li>
        <span class="material-icons"> pie_chart </span>
        <a href="#">Dashboard</a>
      </li>
      <li>
        <span class="material-icons"> pie_chart </span>
        <a href="#">Dashboard</a>
      </li>
      <li>
        <span class="material-icons"> pie_chart </span>
        <a href="#">Dashboard</a>
      </li>
      <li>
        <span class="material-icons"> pie_chart </span>
        <a href="#">Dashboard</a>
      </li>
      <li>
        <span class="material-icons"> pie_chart </span>
        <a href="#">Dashboard</a>
      </li>
      <li>
        <span class="material-icons"> pie_chart </span>
        <a href="#">Dashboard</a>
      </li>
    </div>
  </section>

EOT;
}
