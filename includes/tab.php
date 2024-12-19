<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tab</title>
    <style> 
    
.tab {
    display: flex;
    justify-content: center;
    margin-top: 40px;
}

.tab button {
    margin: 0 10px;
    padding: 10px 20px;
    font-size: 14px;
    border: 1px solid black;
    border-radius: 8px;
    background: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.tab button:focus {
    background-color: black;
    color: white;
}




    </style>
</head>
<body>
<div class="tab">
        <button class="active">Consultation History</button>
        <button>My Device</button>
        <button>Profile</button>
    </div>


</body>
</html>