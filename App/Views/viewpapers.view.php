<?php include 'partials/head.php'; ?>

<body class="login">
    <?php include 'partials/nav.php'; ?>
    <div class="parallax overflow-hidden bg-blue-400 page-section third">
        <div class="container parallax-layer" data-opacity="true"
            style="transform: translate3d(0px, 0px, 0px); opacity: 1;">
            <div class="media v-middle">
                <div class="media-left text-center">
                    <a href="#">
                        <img src="/App/Data/images/users/<?= $user->profilepic ?>.jpg" alt="people"
                            class="img-circle width-80">
                    </a>
                </div>
                <div class="media-body">
                    <h1 class="text-white text-capitalize text-display-1 margin-v-0">
                        <?= $user->fname . ' ' . $user->lname ?></h1>
                    <p class="text-subhead"><a class="link-white text-capitalize"
                            href=""><?= $user->city . ' , ' . $user->country ?></a></p>
                </div>
                <div class="media-right">
                    <span class="label bg-blue-500 text-uppercase"><?= $_SESSION['type'] ?></span>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="page-section">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="media v-middle">
                            <div class="media-left">
                                <div class="bg-green-400 text-white">
                                    <div class="panel-body">
                                        <i class="fa fa-pencil fa-fw fa-2x"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="media-right media-padding">
                                <a class="btn btn-white paper-shadow relative" data-z="0.5" data-hover-z="1"
                                    data-animated="" href="/addPaper">
                                    Add New Paper
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">

                            <h4 class="page-section-heading">My Research Papers</h4>
                            <div class="panel panel-default">
                                <!-- Progress table -->
                                <div class="table-responsive">
                                    <table class="table v-middle">
                                        <thead>
                                            <tr>
                                                <th width="20">
                                                    <div class="checkbox checkbox-single margin-none">
                                                        <input id="checkAll" data-toggle="check-all"
                                                            data-target="#responsive-table-body" type="checkbox"
                                                            checked="">
                                                        <label for="checkAll">Check All</label>
                                                    </div>
                                                </th>
                                                <th class="text-capitalize">Title</th>
                                                <th class="text-capitalize">Summary</th>
                                                <th class="text-capitalize">Teacher</th>
                                                <th class="text-capitalize">Created On</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="responsive-table-body">
                                            <?php if (count($papers) > 0) :
                        foreach ($papers as $i) :
                      ?>
                                            <tr>
                                                <td>
                                                    <div class="checkbox checkbox-single">
                                                        <input id="<?= $i->id ?>" name="papersid[]"
                                                            value="<?= $i->id ?>" type="checkbox" checked="">
                                                        <label for="<?= $i->id ?>"><?= $i->id ?></label>
                                                    </div>
                                                </td>
                                                <td><span
                                                        class="label text-capitalize label-default"><?= $i->title ?></span>
                                                </td>
                                                <td><span
                                                        class="label text-capitalize label-default"><?= substr($i->body, 0, 25) ?></span>
                                                </td>
                                                <?php foreach ($faculty as $f) :
                              if ($f->id == $i->facid) : ?>
                                                <td><span
                                                        class="label text-capitalize label-default"><?= $f->fname . ' ' . $f->lname ?></span>
                                                </td>
                                                <?php break;
                              endif;
                            endforeach; ?>
                                                <td class="text-capitalize">
                                                    <?= date('d-M-Y', strtotime($i->createdat)) ?></td>
                                                <td class="text-right">
                                                    <a href="/viewPaper/<?= $i->id ?>"
                                                        class="btn btn-default btn-xs ripple" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="View"><span
                                                            class="ink animate"
                                                            style="height: 22px; width: 22px; top: -4px; left: -6.1875px;"></span><i
                                                            class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach;
                      endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- // Progress table -->

                                <!-- <div class="panel-footer padding-none text-center">
              <ul class="pagination">
                <li class="disabled"><a href="#">??</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">??</a></li>
              </ul>
            </div> -->
                                <a href="/commentpost/">
                                    <button type="button" class="btn btn-secondary">Comments</button>
                                </a><span>
                                    <a href="">
                                        <button type="button" class="btn btn-secondary">Feedback</button>
                                    </a>
                                </span>
                                <span>
                                    <button type="button" class="btn btn-secondary">Marks</button>
                                </span>
                                <button type="button" class="btn btn-secondary">Status</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include 'partials/dashnav.php' ?>
            </div>
        </div>
    </div>
    <?php include 'partials/foot.php'; ?>