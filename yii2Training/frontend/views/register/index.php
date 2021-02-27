<?php
use yii\helpers\Html;
//use frontend\widget\MyWidget;
?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Image</th>
      <th scope="col">Dob</th>
      <th scope="col">Password</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $key) {
        ?>
        <tr><td><?= $key->id ?></td>
            <td><?= $key->name?></td>
            <td><?= $key->mobile ?></td>
            <td><img src="<?='../../web/uploads/'.$key->image ?>" height='70px',width='70px' alt='no image found'></td>
            <td><?= $key->dob ?></td>
            <td><?= $key->password ?></td>
            <td><?=Html::a('Update',['update','id'=>$key->id])?>
                <?=Html::a('Delete',['delete','id'=>$key->id])?>
            </td>
    
        <?php
    }?>
    <tr>

    </tr>
  </tbody>
</table>