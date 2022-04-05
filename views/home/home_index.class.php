<?php

class HomeIndex extends IndexView {
    public function display() {
        parent::displayHeader("Home");
        ?>

        <div id="hero">
        <form action="search">
            <input name="" type="text">
        </form>
    </div>

    <div id="section">
        <p>Cras pulvinar mattis nunc sed blandit libero. Nibh praesent tristique magna sit amet purus gravida. Accumsan
            lacus vel facilisis volutpat est velit egestas dui id. Odio pellentesque diam volutpat commodo sed egestas
            egestas fringilla phasellus. Non odio euismod lacinia at quis risus sed. Est sit amet facilisis magna etiam
            tempor. Nunc id cursus metus aliquam eleifend mi. Ipsum faucibus vitae aliquet nec. Ut pharetra sit amet
            aliquam id diam maecenas ultricies mi. Molestie at elementum eu facilisis sed odio. Quisque id diam vel quam
            elementum pulvinar etiam non quam. Euismod elementum nisi quis eleifend. Facilisis gravida neque convallis
            a. Erat pellentesque adipiscing commodo elit at imperdiet dui accumsan sit. Sed id semper risus in
            hendrerit.</p>
    </div>

<?php
        parent::displayFooter();
    }
}