<?php

//PDF

require "../../helpers/fpdf.php";
require "../../models/comments.php";
require "../../models/posts.php";
require "../../models/users.php";
require "../../config/db.php";

$p = new Posts;
$c = new Comments;
$u = new Users;

$All_posts = $p->getAll_Posts()->num_rows;
$All_users = $u->getAll_users()->num_rows;
$All_comments = $c->getAll_comments()->num_rows;
$All_likes = $p->get_all_likes_of_the_posts()->num_rows;

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 13);

$pdf->SetTitle("ForoCarros");
$pdf->SetAuthor("Pedro Dura Berna");
$pdf->Text(10,20,"Informacion general de ForoCarros");
$pdf->Ln(20);
$pdf->SetFillColor(200, 100, 100);
$pdf->Cell(45, 10, "POSTS", 1, 0, "C", true);
$pdf->SetFillColor(200, 100, 100);
$pdf->Cell(45, 10, "USUARIOS", 1, 0, "C", true);
$pdf->SetFillColor(200, 100, 100);
$pdf->Cell(45, 10, "COMENTARIOS", 1, 0, "C", true);
$pdf->SetFillColor(200, 100, 100);
$pdf->Cell(45, 10, "LIKES", 1, 0, "C", true);
$pdf->Ln();
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(45, 10, $All_posts, 1, 0, "C", true);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(45, 10, $All_users, 1, 0, "C", true);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(45, 10, $All_comments, 1, 0, "C", true);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(45, 10, $All_likes, 1, 0, "C", true);
$pdf->Ln(500);
$pdf->Text(10,270,"Por: Pedro Dura Berna");

$pdf->Output();

?>
