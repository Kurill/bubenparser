<?php
include 'simple_html_dom.php';

function traverseFindByInnerText(simple_html_dom_node $node, $text) {
    if ($node->innertext == $text) {
        return $node;
    }
    if(!isset($node->children)) {
        die('sss');
        return null;
    }

    foreach ($node->children as $child) {
        $found = traverseFindByInnerText($child, $text);
        if ($found) {
            return $found;
        }
    }
    return null;
}

function findLocalRootNode(simple_html_dom_node $node) {
    if($node->parentNode()->text() != $node->text()) {
        return $node;
    }
    return findLocalRootNode($node->parentNode());
}



$html = file_get_html('testfile.html');
$i = 0;

while ($neededNode = traverseFindByInnerText($html->root, 'Getting Started')) {
    $i++;
    $neededNode = findLocalRootNode($neededNode);
    $idx = array_search($neededNode, $neededNode->parentNode()->children(), true);

    echo "\n==================KEY-$i==================\n\n";
    echo $neededNode->parentNode()->children()[$idx+1]->outertext;
    $neededNode->remove();
}


