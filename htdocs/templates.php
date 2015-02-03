<?php 
  $page_name = "Book Templates";
  require('./blog/wp-blog-header.php');
  get_header(); 
?>

<?php

  $passwd = "";

	if(!empty($_POST)) { extract($_POST); }
	if(!empty($passwd)) {
		if(strtolower($passwd) == 'athena') {
			// send mail and direct them to the templates' download page.
			$pdf								  = 1;
			$to 								  = 'template@careerwomaninc.com';
			$headers 							= 'From: ' . $to . "\r\n";
			$content							= 'A visitor has recently filled out the "Download Templates" form. The information gathered is as follows:' . "\r\n\r\n";
			$content							.= 'Where do you live? ' . $geo . "\r\n";
			$content							.= 'Age: ' . $age . "\r\n";
			$content							.= 'Income: ' . $inc . "\r\n";
			$content							.= 'Job Type: ' . $jobt . "\r\n";
			$content							.= 'Job Level: ' . $jobl . "\r\n";
			mail($to, "Templates Download Information", $content, $headers);
			
		} 
		else {
			$errBox = 1;
		}
	} 
	elseif((!empty($_POST)) && (empty($passwd))) {
		$errBox = 2;
	}
?>

  <section class="column-left">
    <article class="article-page">
      <h1>Book Templates</h1>
      
      <div class="copy">

        <?php 
					if((empty($errBox)) && (!empty($pdf))) {
				?>
				
        <p>Thank you for choosing to download the worksheet templates. Please use the link below to download the templates.</p>
        <p>For Internet Explorer users, right click on the link and select &quot;Save Target As...&quot; to download the worksheet template.</p>
        <p>For FireFox / Mozilla users, right click on the link and select &quot;Save Link As...&quot; to download the worksheet template.</p>
        
        <div class="download-box">
          <h4>Download Worksheets - Print and Complete</h4>
          <a href="download/CareerWomanBookTemplates.pdf">All Templates</a> 
          
          <h4>Download Worksheets - Acrobat Forms</h4> 
          <a href="download/CareerWoman_TemplateForms.zip" class="zip">All Templates</a> 
          <a href="download/01_Assets-Liabilities_p.pdf">1. Assets and Liabilities List</a> 
          <a href="download/02_AdmiredPeople_p.pdf">2. Admired People List</a> 
          <a href="download/03_AssetsList_p.pdf">3. Assets List</a> 
          <a href="download/04_Feedback_p.pdf">4. Feedback</a> 
          <a href="download/05_PositionRequirements_p.pdf">5. Position Requirements</a> 
          <a href="download/06_CompetitiveAnalysis_p.pdf">6. Competitive Analysis</a> 
          <a href="download/07_SWOTAnalysis_p.pdf">7. S.W.O.T. Analysis</a> 
          <a href="download/08_GoalsList_p.pdf">8. Goals List </a> 
          <a href="download/09_StrategicPlan_p.pdf">9. Strategic Plan</a> 
          <a href="download/10_AccomplishmentsList_p.pdf">10. Accomplishments List</a> 
          <a href="download/11_Notes_p.pdf">11. Notes</a> 
        </div>

        <div class="download-box get-reader">
          <a href="products/acrobat/readstep2.html" class="reader" target="_blank">Get Adobe Acrobat Reader</a> 
        </div>
        
      <?php
				} else {
			?>

        <form action="templates.php" method="post">
          <table width="100%" border="0" cellspacing="0" cellpadding="1">
            <tr>
              <td colspan="2" align="left" valign="top">As a service for those who have purchased the book <a href="/resources/your-career-your-way">&quot;Your Career, Your Way&quot;</a>, 
                the worksheet templates included in the book have been made available for electronic download.  If you have 
                purchased the book, please look in either the Introduction or Appendix 
                for the password that will enable you to download the templates.</td>
            </tr>
            <tr>
              <td width="150" align="left" valign="top">&nbsp;</td>
              <td width="316" align="left" valign="top">&nbsp;</td>
            </tr>
            <?php
						  if((!empty($errBox)) && ($errBox == 1)) {
					  ?>
            <tr>
              <td colspan="2" align="left" valign="top"><div class="testi">
                  <div id="errBox"> <span class="q">The password you entered does not match the password necessary 
                    to download the templates.</span> <br />
                    If you feel as if you have mis-typed the password, please try again.
                    If you are unsure of the password, please refer to either page 5 or page 105 
                    of the book "Your Career, Your Way" for the password that will enable
                    you to download the templates. </div>
                </div></td>
            </tr>
            <?php
						  } elseif((!empty($errBox)) && ($errBox == 2)) {
					  ?>
            <tr>
              <td colspan="2" align="left" valign="middle"><div class="testi">
                  <div id="errBox"> <span class="q">A password is required in order to download the templates.</span> </div>
                </div></td>
            </tr>
            <?php
						  } 
					  ?>
            <tr>
              <td align="left" valign="middle">Password:</td>
              <td align="left" valign="middle"><input name="passwd" type="text" class="mediumbox" value="<?=$passwd?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top"><span style="padding-top:8px;">
                <input type="submit" name="submit" value="Download Templates" />
                </span></td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
          </table>
        </form>
        <?php
				  } 
			  ?>

      </div>
    </article>
  </section>
  
  <section class="column-right">
    <?php include "blog/wp-content/themes/cwi-2011/sidebar-with-testimonial.php" ?>
  </section>

<?php get_footer(); ?>
