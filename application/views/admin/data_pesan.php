<div class="module message">
    <div class="module-head">
        <h3>Pesan</h3>
    </div>
    <div class="module-body">
        <div class="module-option clearfix">
            <div class="pull-left">
                <a href="<?= base_url('/message/create') ?>" class="btn btn-primary"><i class="icon-pencil"></i> Tulis pesan</a>
            </div>
        </div>
        <div class="module-body table">
            <table class="table table-message">
                <tbody>
                    <?php foreach ($inbox as $d) {
                    ?>
                    <tr class="<?php if($d->opened == o) {echo 'unread';} ?> clickable-row" data-href="<?= base_url('message/detail/'). $d->id ?>">
                        <td class="cell-author">
                            <img style="height:30px;width:30px; margin-right: 10px;" class="img-polaroid img-circle pull-left" src="{{ d.profil.link_image }}">
                            <a href="{{ d.profil.link_profil }}">{{ character_limiter(d.profil.nama, 23, '...') }}</a>
                            <br>
                            {% if d.timeago is not empty %}
                                <time class="timeago" datetime="{{ d.timeago }}">{{ d.date }}</time>
                            {% else %}
                                <small>{{ d.date }}</small>
                            {% endif %}
                        </td>
                        <td class="cell-title hidden-phone hidden-tablet">
                            <a class="pull-right" style="margin-left:10px;" href="{{ site_url('message/detail/' ~ d.id ~ '/?confirm=1#confirm') }}"><i class="icon-trash"></i></a>
                            {% if d.receiver is not empty %}
                            <div>To <a href="{{ d.receiver.link_profil }}">{{ d.receiver.nama }}</a></div>
                            {% endif %}
                            {{ character_limiter(strip_tags(d.content), 80, '...')|raw }}
                        </td>
                    </tr>
                    <?php }  ?>

                </tbody>
            </table>
        </div>
        <div class="module-foot">
            {{ pagination|raw }}
        </div>

    </div>
</div>