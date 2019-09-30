<?php

?>
<html>
<head>
    <title>Magazine</title>
    <!--Возможность добавления на главный экран-->
    <meta name="mobile-web-app-capable" content="yes">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no"/>

    <link href="fontawesome/css/all.css" rel="stylesheet">
    <script defer src="fontawesome/js/all.js"></script>
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/brands.css" rel="stylesheet">
    <link href="/fontawesome/css/solid.css" rel="stylesheet">
    <script defer src="fontawesome/js/brands.js"></script>
    <script defer src="fontawesome/js/solid.js"></script>
    <script defer src="fontawesome/js/fontawesome.js"></script>

    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/DragManager.js"></script>

    <script>
        DragManager.onDragCancel = function (dragObject) {
            dragObject.avatar.rollback();
        };

        DragManager.onDragEnd = function (dragObject, dropElem) {
            let text = dragObject.elem.innerText;
            dragObject.elem.style.display = 'none';

            this.onDragCancel(dragObject);
            dragObject.elem.style.display = 'block';

            dropElem.appendChild(document.createTextNode(text));
        };
    </script>

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <?php
        include('articles.php');
        include('pages.php'); ?>
    </div>
</div>

<script>
    let ClientHeight = document.documentElement.clientHeight,
        ClientWidth = document.documentElement.clientWidth;
    let width = document.getElementById('page1').offsetWidth;
    $('.articles').css('height', ClientHeight - 50);
    $('.pages').css('height', ClientHeight - 50);
    window.onresize = function (event) {
        setPageSize();
    };
    $(document).ready(function () {
        for (let i = 1; i <= 10; i++) {
            createArticles(i);
        }
        setPageSize();
    });

      defaultSettings(document.getElementById('page1'));

    function pageQuantity(element) {
        let quantity = parseInt(element.value) + 1;
        for (let i = 1; i <= quantity; i++) {
            let page = document.createElement('div');
            page.className = 'col-xl-2 page';
            page.id = 'page';
            page.dataset.rowquantity = 0;
            createRowOnPage(page);
            page.onclick = function () {
                onPageClick(page)
            };
            setPageSize();
            document.getElementById('pagesBox').appendChild(page);
        }
        if (quantity > 0)
            document.getElementById('pagesBox').removeChild(document.getElementById('pagesBox').lastChild);
    }

    function createArticles(i) {
        let article = document.createElement('div');
        article.className = 'col-xl-12 article draggable';
        article.id = 'article';
        article.innerText = i;
        console.log(article);
        document.getElementById('articles').appendChild(article);
    }

    function setPageSize() {
        let width = document.getElementById('page1').offsetWidth;
        $('.page').css('height', parseInt(width) * Math.sqrt(2) + "px");
    }

    function createRowOnPage(element) {
        let div = document.createElement('div');
        div.className = 'row droppable pageRow';
        div.innerText = 'test';
        element.dataset.rowquantity++;
        div.style.height = (1 / element.dataset.rowquantity) * 100 + '%';
        element.appendChild(div);

        if (element.childNodes[0]) element.childNodes[0].style.height = (1 / element.dataset.rowquantity) * 100 + '%';
        if (element.childNodes[1]) element.childNodes[1].style.height = (1 / element.dataset.rowquantity) * 100 + '%';
        if (element.childNodes[2]) element.childNodes[2].style.height = (1 / element.dataset.rowquantity) * 100 + '%';
    }

    function onPageClick(element) {
        console.log(element.childNodes);
        if (element.dataset.rowquantity < 3) {
            createRowOnPage(element);
        }
    }

    function defaultSettings(element) {
        while (element.firstChild) {
            element.removeChild(element.firstChild);
        }
        createRowOnPage(element);
    }

    function showFullPage(element) {
        test3 = 'fsf';
    }


    class test{
      id = 10;
    }
    q = new test();
    console.log(id);

</script>
</body>
</html>
