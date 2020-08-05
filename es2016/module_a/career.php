<?php
  $career_data = [
    ["name" => "Carpenter", "image" => "/media/photos/carpenter.jpeg"],
    ["name" => "Park Helper", "image" => "/media/photos/park-helper.jpeg"],
    ["name" => "Financial manager", "image" => "/media/photos/financial-manager.jpeg"],
    ["name" => "Mobile app developer", "image" => "/media/photos/mobile-app-developer.jpeg"],
    ["name" => "Copywriter", "image" => "/media/photos/copywriter.jpeg"],
  ];
  header('Content-Type: application/json');
  echo json_encode($career_data);
