<?php
  $career_data = [
    ['name' => "Carpenter", 'image' => "/media/photos/photo-1451933371645-a3029668b979.jpeg"],
    ['name' => "Park Helper", 'image' => "/media/photos/photo-1461280360983-bd93eaa5051b.jpeg"],
    ['name' => "Financial manager", 'image' => "/media/photos/photo-1427751840561-9852520f8ce8.jpeg"],
    ['name' => "Mobile app developer", 'image' => "/media/photos/photo-1432888498266-38ffec3eaf0a.jpeg"],
    ['name' => "Copywriter", 'image' => "/media/photos/photo-1448932155749-638e51b56f03.jpeg"],
  ];
  header('Content-Type: application/json');
  echo json_encode($career_data, JSON_PRETTY_PRINT);
