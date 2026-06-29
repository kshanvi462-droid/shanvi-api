<?php
header('Content-Type: application/json');
$tips = [
    "Tip 1: Take short breaks every 45 minutes.",
    "Tip 2: Stay hydrated while studying.",
    "Tip 3: Teach what you learned to someone else.",
    "Tip 4: Keep your smartphone in another room.",
    "Tip 5: Review your notes before going to sleep."
];
echo json_encode($tips);
?>