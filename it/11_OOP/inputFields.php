<?php
    // Создание интерфейса
    interface InputFields {
        public function addStyles(array $styles);
        public function show();
        public function showStyles();
    }

    // ВАРИАНТ 1 - Сохранение стиля в файл class.css
    class InputEmail implements InputFields {
        protected $_html = '<input type="email">';
        private $select;

        public function show() {
            echo '<h5>1. Установка стилей в файл class.css</h5>';
            $show = $this->_html;
            echo $show.'<br>';
        }
        public function addStyles(array $styles) {
            // Получаем стили из массива и вносим в переменную $this->select
            $this->select = 'input[type='.explode('"', $this->_html)[1].'] {';
            foreach ($styles as $key => $value) {
                $this->select .= $key.':'.$value.';';
            };
            $this->select .= '}';
            // Сохраняем переменную в файл
            $file = fopen('css/class.css', 'w'); //----- file
            fwrite($file, $this->select); //---------- file
            fclose($file); //--------------------------- file
        }
        public function showStyles() {
            echo 'Стили, что были применены при помощи метода <b>addStyles</b><br>';
            $arr = explode(']', $this->select);
            echo '<span style="color: brown">'.$arr[0].']</span><br>'; 
            $arr = explode(';', $arr[1]);
            foreach ($arr as $value) {
                echo $value.';<br>';
            }
            echo '<hr>';
        }
    }

    // // ВАРИАНТ 2 - Сохранение стиля внутри элемента input
    class InputFile implements InputFields {
        protected $_html = '<input type="file">';
        private $select;

        public function show() {
            echo '<h5>2. Установка стилей внутри объекта input</h5>';
            $show = '<input '.$this->select.' "type'.explode('type', $this->_html)[1];
            echo $show.'<br>';
        }
        public function addStyles(array $styles) {
            // Получаем стили из массива и вносим в переменную $this->select
            $this->select = 'style="';
            foreach ($styles as $key => $value) {
                $this->select .= $key.':'.$value.';';
            };
            $this->select .= '}';
        } 
        public function showStyles() {
            echo 'Стили, что были применены при помощи метода <b>addStyles</b><br>';
            $arr = explode(']', $this->select);
            echo '<span style="color: brown">'.$this->select.'</span><br>';
            echo '<hr>'; 
        }
    }

    // ВАРИАНТ 3 - Сохранение стиля внутри элемента head (<style></style>)
    class InputText implements InputFields {
        protected $_html = '<input type="text">';
        private $select;

        public function show() {
            echo '<h5>3. Установка стилей внутри элемента head (<style></style>)</h5>';
            $show = $this->_html;
            echo $show.'<br>';
        }
        public function addStyles(array $styles) {
            // Получаем стили из массива и вносим в переменную $this->select
            $this->select = '<style>'.'input[type='.explode('"', $this->_html)[1].'] {';
            foreach ($styles as $key => $value) {
                $this->select .= $key.':'.$value.';';
            };
            $this->select .= '}</style>';
            // Сохраняем переменную в файл
            $file = fopen('header.php', 'w'); //-------- file
            fwrite($file, $this->select); //------------ file
            fclose($file); //--------------------------- file
        }
        public function showStyles() {
            echo 'Стили, что были применены при помощи метода <b>addStyles</b><br>';
            $arr = explode(']', $this->select);
            $arr = explode(';', $arr[1]);
            foreach ($arr as $value) {
                echo $value.';<br>';
            }
            echo '<hr>';
        }
    }

?>

