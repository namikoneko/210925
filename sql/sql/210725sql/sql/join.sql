    SELECT
    tag.id as tagid,tag.title as tagtitle,
    post.id as postid,post.date as postdate,post.ttl as postttl,post.ttl2 as postttl2,post.text as posttext
    FROM tag 
    left JOIN post
    ON tag.id = post.parentid 
--    where tag.id = $tagrow->id
--    and "$startdatestr" < post.date 
--    and post.date < "$enddatestr"
--    order by tag.updated desc
