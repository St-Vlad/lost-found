<style>
    table{
        width: 100%;
        max-width: 100%;
    }
    td {
        padding: 10px 10px;
        text-align: center;
    }
</style>

<a href="/admin">На головну</a>

<table border="5" id="finds-table">
    <caption>
        <h2>Знахідки</h2>
    </caption>
    <thead>
        <tr>
            <th>Id знахідки</th>
            <th>Id користувача</th>
            <th>Назва знахідки</th>
            <th>Додаткова інформація</th>
            <th>Місце знахідки</th>
            <th>Дата посту</th>
            <th>Ухвалено</th>
            <th>Фото</th>
            <th>Змінити</th>
            <th>Видалити</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($finds as $key=>$item):?>
            <tr>
                <td><?= $item['find_id']?></td>
                <td><?= $item['user_id']?></td>
                <td contenteditable="true"><?= $item['title']?></td>
                <td contenteditable="true"><?= $item['additional_info']?></td>
                <td contenteditable="true"><?= $item['place_of_find']?></td>
                <td><?= $item['post_date']?></td>
                <td contenteditable="true"><?= $item['approved']?></td>
                <td id="image"><img width=100px src="data:image/jpeg;base64, <?= $item['image']?>" alt="немає фото"></td>
                <td><a href="/admin/finds/update/<?= $item['find_id']?>">Змінити</a> </td>
                <td><a href="/admin/finds/delete/<?= $item['find_id']?>">Видалити</a></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
