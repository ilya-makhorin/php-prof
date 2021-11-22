<?php
$limit = 3;
$dbh = new PDO('mysql:dbname=shop;host=localhost', 'root', 'Marina024');

$page = intval(@$_GET['page']);
$page = (empty($page)) ? 1 : $page;
$start = ($page != 1) ? $page * $limit - $limit : 0;
$sth = $dbh->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM `catalogs` LIMIT {$start}, {$limit}");
$sth->execute();
$items = $sth->fetchAll(PDO::FETCH_ASSOC);
$sth = $dbh->prepare("SELECT FOUND_ROWS()");
$sth->execute();
$total = $sth->fetch(PDO::FETCH_COLUMN);
$amt = ceil($total / $limit);
?>

<div id="showmore-list">
    <div class="prod-list">
        <?php foreach ($items as $row): ?>
            <div class="prod-item">
                <div class="prod-item-name">
                    <?php echo $row['name']; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="showmore-bottom">
    <a data-page="<?php echo $page; ?>" data-max="<?php echo $amt; ?>" id="showmore-button" href="#">Показать еще</a>
</div>

<script src="/assets/js/jquery-3.5.1.min.js"></script>

<script>
    $(function(){
        $('#showmore-button').click(function (){
            var selector = '#showmore-list .prod-list';
            var $target = $(this);
            var page = $target.attr('data-page');
            page++;
            $.ajax({
                url: '?page=' + page,
                dataType: 'html',
                success: function(data){
                    $(selector).append($(data).find(selector).html());
                }
            });

            $target.attr('data-page', page);
            if (page ==  $target.attr('data-max')) {
                $target.hide();
            }

            return false;
        });
    });
</script>