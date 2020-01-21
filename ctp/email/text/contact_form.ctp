<?php
foreach ($data as $key => $value) {
    printf("%s: %s\n\n", Inflector::humanize($key), $value);
}