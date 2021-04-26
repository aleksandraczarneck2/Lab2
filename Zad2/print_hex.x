struct input
{
    char data[256];
};

program HEX_P
{
    version HEX_V
    {
        void hex(input) = 1;
    } = 1;
} = 0x21000000;