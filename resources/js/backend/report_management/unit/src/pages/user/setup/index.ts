import setup_type from "./setup_type";

const prefix: string = "Unit User";

const setup: setup_type = {
    prefix,

    api_end_point: "unit-user",

    module_name: "unit-user",
    store_prefix: "unit_user",
    route_prefix: "UnitUser",
    route_path: "unit-user",

    select_fields: [
        "id",
        "role",
        "full_name",
        "gender",
        "image",
        "telegram_name",
        "telegram_id",
        "email",
        "password",
        "blood_group",
        "is_permitted",
        "status",
        "created_at",
    ],

    sort_by_cols: [
        "id",
        "title",
        "description",
        "tags",
        "writer",
        "meta_description",
        "meta_keywords",
        "thumbnail_image",
        "image",
        "blog_type",
        "url",
        "show_top",
        "status",
        "created_at",
    ],

    layout_title: prefix + " Management",
    page_title: `${prefix} Management`,

    all_page_title: "All " + prefix,
    details_page_title: "Details " + prefix,
    create_page_title: "Create " + prefix,
    edit_page_title: "Edit " + prefix,
};

export default setup;
