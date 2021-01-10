## About Project

- Job Demo site with user login system
- User can search jobs
- User can apply for *Active Jobs* only *Once*
- User can update profile information
- User can upload his CV
- User can see *All Applied jobs*


- Admin can create , edit, update or delete jobs 
- Admin can *change status* of job
- Admin can check *User wise Application*
- Admin can *create roles* , **This feature is disabled , you can enable it by defining Gates and Policies**
- Admin can check *Job wise application*
- Admin can download CV

## Few steps about project
    --Using user table with is_admin column and Middleware
        - Create User
        - Assign Admin role by setting is_admin true
    --Using user table with role_user relation and permissions with Gate and policies
        - **Coming Soon**