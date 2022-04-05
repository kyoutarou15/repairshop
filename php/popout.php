<?php
    session_start();

    function popout_render()
    {
        if (!array_key_exists('popout', $_SESSION))
            return;

        echo '
            <div class="popout" id="popout" onclick="document.getElementById(\'popout\').style.display = \'none\'">
                <p>' . $_SESSION['popout'] . '</p>
            </div>
        ';

        unset($_SESSION['popout']);
    }

    function popout_set($value)
    {
        $_SESSION['popout'] = $value;
    }
?>