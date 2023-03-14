<section id="results">  

    <h1>Je Ljubljana bolana?</h1>

    <div class="answer"><?php echo $answer; ?></div>

    <?php if ($answer === "JA") { ?>
    <h2>Kaj jo zastruplja danes?</h2>
    <?php } else { ?>
    <div class="ne-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non pharetra sapien. Aenean vestibulum justo ut nunc ultricies egestas. Ut molestie sem erat, non tempor erat interdum nec. Nulla dictum tellus et dui pharetra, quis pharetra lorem posuere. Vivamus lacinia sapien sed sapien volutpat, dapibus pellentesque sem mattis. Integer imperdiet condimentum elit id consectetur. Nulla consequat nisi arcu, non egestas magna efficitur vitae. Maecenas nec leo feugiat, laoreet ipsum a, maximus turpis. Quisque pellentesque, elit vitae tincidunt fermentum, erat eros mollis dolor, ornare ultricies libero mauris a libero. Cras tincidunt luctus nulla sollicitudin lobortis.
    </div>
    <?php } ?>

    <div class="indicator-wrapper">

        <!-- ZAČETEK FOR LOOPA -->
        <?php foreach($elements as $element) { ?>
        <div class="indicator-element">
            <div class="indicator-graph">
                <div class="inner-graph">
                    <div class="bar" style="height: <?php echo $element["value"]; ?>%;"></div>
                    <?php if (!empty($element["slo"])) { ?>
                    <div class="slo-text" style="bottom: <?php echo $element["slo"]; ?>%;">SLO</div>
                    <div class="slo" style="height: <?php echo $element["slo"]; ?>%;"></div>
                    <?php } ?>
                    <div class="who-text" style="height: <?php echo $element["who"]; ?>%;">WHO</div>
                    <div class="who" style="height: <?php echo $element["who"]; ?>%;"></div>
                </div>
                <div class="graph-label">
                    <?php echo $element["label"]; ?>
                </div>
            </div>
            <div class="indicator-text">
                <?php echo $element["text"]; ?>
            </div>
        </div>
        <?php }; ?>
        <!-- KONEC FOR LOOPA -->


    </div>

    <div class="footer">Vir: Odprti podatki Agencije Republike Slovenije za okolje (ARSO), Merilna postaja Ljubljana Bežigrad</div>
   
</section>