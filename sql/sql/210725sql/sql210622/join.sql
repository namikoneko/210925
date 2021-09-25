SELECT cat.id as catid,cat.title as cattitle,
tag.id as tagid,tag.title as tagtitle
FROM tag
left JOIN cat
ON cat.id = tag.catid;
