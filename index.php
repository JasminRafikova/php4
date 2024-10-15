<?php
class Cookie {
    private $type;

    private $availableTypes = ['шоколадное', 'овсяное', 'имбирное', 'сахарное'];

    public function setType($type) {
        if (in_array($type, $this->availableTypes)) {
            $this->type = $type;
        } else {
            return "Тип печенья '$type' недоступен. Пожалуйста, выберите из доступных: " . implode(', ', $this->availableTypes) . ".";
        }
    }

   
    public function getType() {
        return isset($this->type) ? $this->type : 'Тип не установлен';
    }

   
    public function getAvailableTypes() {
        return $this->availableTypes;
    }
}

$cookie = new Cookie();
$cookie->setType($_POST['cookie_type'] ?? '');

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Выбор типа печенья</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
        select, button {
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Выбор типа печенья</h1>
        <form method="POST">
            <label for="cookie_type">Выберите тип печенья:</label>
            <select id="cookie_type" name="cookie_type">
                <?php foreach ($cookie->getAvailableTypes() as $type) : ?>
                    <option value="<?= $type ?>" <?php if ($cookie->getType() === $type) echo 'selected'; ?>><?= $type ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Сохранить</button>
        </form>
        <p>
            Тип печенья: <?= $cookie->getType() ?>
        </p>
    </div>
</body>
</html>

