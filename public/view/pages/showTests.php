<?php foreach ($tests as $test): ?>
    <form action="" method="post">
        <h3 class="mt-3"><?= $test['question_text'] ?></h3>
        <ul class="list-group">
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                <?= $test['answer1'] ?>
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                <?= $test['answer2'] ?>
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                <?= $test['answer3'] ?>
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                <?= $test['answer4'] ?>
            </li>
        </ul>
        <button type="submit" class="btn btn-primary mt-3">Ответить</button>
    </form>
<?php endforeach ?>