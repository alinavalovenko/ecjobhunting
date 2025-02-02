<?php

/***
 * Vacancy Template
 */

use EcJobHunting\Entity\Vacancy;

$vacancy = new Vacancy(get_the_ID());
get_header(); ?>
    <main>
        <?php if (have_posts() && $vacancy): the_post();
            $benefits = $vacancy->getBenefits();
            $employer = $vacancy->getEmployer();
            ?>
            <section class="mt-3 my-md-5">
                <div class="container">
                    <div class="row justify-content-xl-between">
                        <div class="col-12 col-xl-8">
                            <h1 class="mb-md-3 mb-xl-5"><?php echo $vacancy->getTitle(); ?></h1>
                            <div class="vacancy-header"><strong class="my-3">
                                    <?php
                                    if ($vacancy->getCompensationFrom() && $vacancy->getCompensationTo()):
                                        echo sprintf(
                                            __('%s to %s', 'ecjobhunting'),
                                            $vacancy->getCompensationFrom(),
                                            $vacancy->getCompensationTo()
                                        );
                                    else:
                                        echo $vacancy->getCompensationFrom() ? : $vacancy->getCompensationTo();
                                    endif;

                                    echo ' ' . $vacancy->getCompensationPeriodName();
                                    ?></strong>
                                <span class="color-secondary"><?php echo $vacancy->getEmploymentType(); ?></span>
                                <span class="color-secondary"><?php echo $vacancy->getLocation(); ?></span>
                                <?php if ($benefits) : ?>
                                    <strong class="mt-4 mb-2">Benefits Offered</strong>
                                    <ul>
                                        <?php foreach ($benefits as $benefit): ?>
                                            <li><?php echo $benefit; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <article class="mt-5">
                                <?php if ($vacancy->getDescription()): ?>
                                    <h2><?php _e('Job description', 'ecjobhunting')?></h2>
                                    <p class="mb-4"><?php echo $vacancy->getDescription(); ?></p>
                                <?php endif; ?>

                                <?php if ($vacancy->getReasonsToWork()): ?>
                                    <h3><?php _e('Why Work at This Company?', 'ecjobhunting')?></h3>
                                    <p class="mb-4"><?php echo $vacancy->getReasonsToWork(); ?></p>
                                <?php endif; ?>

                                <?php if ($vacancy->getReasonsToWork()): ?>
                                    <h3><?php _e('About The Penso Agency:', 'ecjobhunting')?></h3>
                                    <p class="mb-4"><?php echo $vacancy->getCompanyDescription(); ?></p>
                                <?php endif; ?>
                            </article>
                            <div class="vacancy-footer"><a class="btn btn-primary btn-lg" href="#">Apply Now</a></div>
                        </div>
                        <div class="col-12 col-xl-3 my-5 d-md-flex d-xl-block">
                            <div class="vacancy-image"><img src="<?php echo $employer->getPhoto(); ?>" alt="<?php echo $employer->getName(); ?>"></div>
                            <div class="vacancy-info">
                                <h2 class="vacancy-company no-decor"><?php echo $vacancy->getCompanyName(); ?></h2>
                                <span class="color-secondary"><?php echo nicetime($vacancy->getDatePosted()); ?></span>
                                <div class="social mt-4"><span>Share this job:</span>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-envelope-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-chain"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <?php get_template_part('content-none'); endif; ?>
    </main>
<?php get_footer();
