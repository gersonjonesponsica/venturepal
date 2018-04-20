<?php 
SELECT DISTINCT m2.*, DATEDIFF(CURRENT_DATE, m2.create_date) as age
FROM (
SELECT m.msme_id, m.msme_name, m.msme_desc, CONCAT(e.e_lname,', ' , e.e_fname, '', e.e_mname) AS entrepname, timestampdiff(DAY, now(), DATE_ADD(m.approve_date, INTERVAL + 30 DAY)) as rem, (m.msme_maxVent - COUNT(mv.msme_id)) AS remaining_venturer, (m.neededCapital - SUM(IFNULL(mv.amount,0))) AS remaining_neededCap, ROUND((SUM(IFNULL(mv.amount, 0)) / m.neededCapital * 100),0) as percent_raised, ROUND((SUM(IFNULL( mv.amount, 0))),0) AS raised, (SELECT COUNT(l.like_id) as totallikes FROM likes l WHERE l.like_to = m.msme_id) AS totallikes, m.sc_id, m.msme_minInvestment, m.msme_maxInvestment,
    m.msme_city, m.msme_state, m.create_date, (SELECT IFNULL(AVG(rr.rr_rate),0) FROM rateandreview rr WHERE rr.rr_to = m.msme_id) AS rateAvarage
FROM msme m,entreprenuer e, msme_venturer mv
WHERE e.e_id = m.e_id AND mv.msme_id = m.msme_id
GROUP BY m.msme_id) m2, bookmark b, investor i, interest it,msme_venturer mv, likes l
WHERE 

(CASE WHEN ".$data['myMatches']." = 1 THEN(m2.msme_id IN (SELECT DISTINCT ms.msme_id FROM msme ms, interest i, investor inv WHERE i.v_id = ".$data['investor_id']." AND i.status = 1 AND ms.sc_id = i.sub_id AND inv.investor_id = ".$data['investor_id']." AND inv.investor_state = ms.msme_state AND ms.msme_city = inv.investor_city AND
((inv.min_investment >= ms.msme_minInvestment AND inv.min_investment <= ms.msme_maxInvestment) 
 OR (inv.max_investment >= ms.msme_minInvestment AND inv.max_investment <= ms.msme_maxInvestment)))) ELSE 1 = 1 END) 
AND

(CASE WHEN ".$data['bookmark']." = 1 THEN (b.to_id = m2.msme_id AND b.from_id = ".$data['investor_id'].") ELSE 1 = 1 end)
AND

(CASE WHEN ".$data['partFunded']." = 1 THEN (m2.raised <> 0) ELSE 1 = 1 END)
AND
((CASE WHEN ".$data['maxInvestment']." <> 0 THEN ".$data['maxInvestment']." BETWEEN m2.msme_maxInvestment AND m2.msme_minInvestment ELSE 1 = 1 END) 
OR 
(CASE WHEN ".$data['minInvestment']." <> 0 THEN ".$data['minInvestment']." BETWEEN m2.msme_minInvestment AND m2.msme_maxInvestment ELSE 1 = 1 END))
AND

((CASE WHEN ".$data['city']." <> '' THEN (m2.msme_city = ".$data['city'].") ELSE 1 = 1 END) AND (CASE WHEN ".$data['province']." <>  '' THEN (m2.msme_state = ".$data['province'].") ELSE 1 = 1 END))
AND
#filter by like of the venturer
(CASE WHEN ".$data['like']." = 1 THEN (l.like_to = m2.msme_id AND l.like_from = ".$data['investor_id'].") ELSE 1 = 1 END)
AND

(CASE WHEN ".$data['latest']."  = 1 THEN (DATEDIFF(CURRENT_DATE, m2.create_date) < 7) ELSE 1 = 1 END)
AND

(CASE WHEN ".$data['category']."  = 1 THEN m2.sc_id IN(1,2,3,4) ELSE 1 = 1 END)
AND
(CASE WHEN ".$data['featured']." = 1 THEN totallikes <> 0 ELSE 1 = 1 END)
HAVING percent_raised <> 100 OR rem <> 0
ORDER BY 
     (CASE WHEN ".$data['featured']." = 1 THEN totallikes ELSE '' END) DESC,
     (CASE WHEN ".$data['partFunded']." = 1 AND ".$data['ordertype']." = 1 THEN m2.percent_raised ELSE '' END) ASC,
     (CASE WHEN ".$data['ordertype']." = 1 AND ".$data['ordertype']." = 0 THEN m2.percent_raised ELSE '' END) DESC,  
     (CASE WHEN ".$data['orderbydate']." = 1 AND ".$data['ordertype']." = 1 THEN m2.create_date ELSE '' END) ASC,
         (CASE WHEN ".$data['orderbydate']." = 1 AND ".$data['ordertype']." = 0 THEN m2.create_date ELSE '' END) DESC,
         (CASE WHEN ".$data['orderbycompletion']." = 1 AND ".$data['ordertype']." = 1 THEN m2.percent_raised ELSE '' END) ASC,
         (CASE WHEN ".$data['orderbycompletion']." = 1 AND ".$data['ordertype']." = 0 THEN m2.percent_raised ELSE '' END) DESC
         
         ?>