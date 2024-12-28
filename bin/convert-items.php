<?php
/**
 * Convert a list of item codes copied anywhere into
 * a Markdown formatted list. Supports codes at the
 * end or front of the line.
 *
 * Usage:
 * 1. Create the `config.json` with the code position.
 * 2. Create the `items.txt` with the list of item codes and names.
 * 3. Run this script.
 *
 * Features:
 * - Sorts the list alphabetically.
 * - Removes empty lines.
 * - Removes leading zeros from codes.
 * - Removes tabs and replaces them with spaces.
 * - Formats the list as Markdown.
 */

declare(strict_types=1);

const CODE_POS_FRONT = 'front';
const CODE_POS_END = 'end';

$configFile = __DIR__ . '/config.json';
$itemsFile = __DIR__ . '/items.txt';

if(!file_exists($configFile))
{
    ?>
<p>ERROR: Please create the <?php echo basename($configFile) ?> file first.</p>
<p>Sample configuration JSON:</p>
<pre>{
  "codePosition": "<?php echo CODE_POS_FRONT; ?>"
}</pre>
<p>Available configuration options:</p>
<ul>
   <li>
       <strong>codePosition</strong> <i><?php echo CODE_POS_FRONT ?></i> | <i><?php echo CODE_POS_END ?></i><br>
       Defines whether the item code is at the front or end of the line in the item list.
   </li>
</ul>
    <?php
    exit;
}

if(!file_exists($itemsFile)) {
    die(sprintf('ERROR: Please create the %s file first.', basename($itemsFile)));
}

$config = json_decode(file_get_contents($configFile), true);
$list = file_get_contents($itemsFile);

$codePos = $config['codePosition'] ?? CODE_POS_FRONT;

$list = str_replace(array("\t", '`'), " ", $list);
$items = explode("\n", $list);
$entries = array();

foreach($items as $item)
{
    $item = trim($item);
    $item = ltrim($item, '-#. ');
    while(str_contains($item, '  ')) {
        $item = str_replace('  ', ' ', $item);
    }

    $parts = explode(" ", $item);

    if($codePos === CODE_POS_FRONT) {
        $code = array_shift($parts);
    } else {
        $code = array_pop($parts);
    }
    
    $code = trim(ltrim($code, '0'));
    $name = trim(implode(' ', $parts));

    if(empty($code) || empty($name)) {
        echo 'Note: No code or name in ['.$item.'].' . "\n";
        continue;
    }

    $entries[$name] = $code;
}

uksort($entries, 'strnatcasecmp');

$result = array();
foreach($entries as $name => $code)
{
    $result[] = sprintf(
        '- %s `%s`',
        $name,
        $code
    );
}

header('Content-Type: text/plain; charset=UTF-8');
echo implode("\n", $result);
