
<a href="/task/one?id=<?= $model->id ?>">
    
<?= \common\widgets\MyWidget::widget([
    'id' => $model->id,
    'name' => $model->name,
    'date' => $model->date,
    'description' => $model->description,
])?>

</a>
