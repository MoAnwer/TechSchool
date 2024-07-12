<?php 
  session_start();
  if (isset($_SESSION['admin'])) {
    header('location: views/dashboard');
    exit();
  } elseif (isset($_SESSION['username'])) {
    header('location: views/inputs');
    exit();
  } else {
    header('location: views/login');
    exit();
  }

  // A14 B15 C16 D27 E28 F33 H37 I38 J41 K44 L45 M46 N60 O62 P63 Q65 R69 S76 T77 U78 V80 W82 X83 Y85 Z87 AA89 BB90 CC91 DD94 EE96 FF98